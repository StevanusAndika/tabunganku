<?php

require_once __DIR__ . '/../models/User.php';

class ProfileController
{
    public function index()
    {
        if (!is_logged_in()) {
            redirect('login');
            return;
        }

        global $conn;
        $userId = $_SESSION['user']['id'];

        $userModel = new User($conn);
        $profile = $userModel->find($userId);

        include __DIR__ . '/../views/profile/index.php';
    }

    public function update()
    {
        if (!is_logged_in()) {
            redirect('login');
            return;
        }

        global $conn;
        $userId = $_SESSION['user']['id'];

        // Ambil data dari form
        $data = [
            'username'   => trim($_POST['username']),
            'email'      => trim($_POST['email']),
            'no_telpon'  => trim($_POST['no_telpon']),
            'alamat'     => trim($_POST['alamat']),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $passwordChanged = false;

        // Cek apakah password diubah
        if (!empty($_POST['password'])) {
            $data['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $passwordChanged = true;
        }

        // Validasi data wajib
        if (empty($data['username']) || empty($data['email'])) {
            set_flash('error', 'Username dan email wajib diisi.');
            redirect('profile');
            return;
        }

        // Validasi file foto
        $photoValid = true;
        $photoError = '';

        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg']; // Tipe file yang diizinkan
            $maxSize = 2 * 1024 * 1024; // Maksimal ukuran file 2MB

            // Periksa tipe file
            if (!in_array($_FILES['photo']['type'], $allowedTypes)) {
                $photoValid = false;
                $photoError = 'Jenis file tidak diizinkan. Hanya file JPG dan PNG yang diperbolehkan.';
            }

            // Periksa ukuran file
            if ($_FILES['photo']['size'] > $maxSize) {
                $photoValid = false;
                $photoError = 'Ukuran file terlalu besar. Maksimal ukuran file adalah 2MB.';
            }

            if ($photoValid) {
                // Pastikan folder tujuan ada
                $randomFileName = uniqid() . '_' . basename($_FILES['photo']['name']); // Nama file acak
                $targetDir = 'public/assets/uploads/'; // Folder upload
                $targetPath = $targetDir . $randomFileName;

                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0755, true);
                }

                if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetPath)) {
                    $data['photo'] = $randomFileName; // Update nama file pada data
                    $data['path_photo'] = $targetPath; // Simpan path file yang baru
                }
            } else {
                // Jika ada kesalahan, set flash message dan redirect
                set_flash('error', $photoError);
                redirect('profile');
                return;
            }
        }

        // Set biodata_status menjadi 'lengkap' jika semua data terisi
        $requiredFields = ['username', 'email', 'no_telpon', 'alamat'];
        $isComplete = true;
        foreach ($requiredFields as $field) {
            if (empty($data[$field])) {
                $isComplete = false;
                break;
            }
        }

        // Cek juga apakah foto sudah diupload
        if (empty($_SESSION['user']['profil_foto']) && empty($data['photo'])) {
            $isComplete = false;
        }

        // Jika semua data lengkap, set biodata_status menjadi 'lengkap'
        if ($isComplete) {
            $data['biodata_status'] = 'lengkap';
        } else {
            $data['biodata_status'] = 'belum lengkap';
        }

        // Update data user
        $userModel = new User($conn);
        $success = $userModel->update($userId, $data);

        if ($success) {
            $_SESSION['user'] = array_merge($_SESSION['user'], $data);
            if ($passwordChanged) {
                set_flash('success', 'Profil berhasil diperbarui dan password diubah pada ' . $data['updated_at'] . '.');
            } else {
                set_flash('success', 'Profil berhasil diperbarui. Tidak ada password yang diubah.');
            }
        } else {
            set_flash('error', 'Gagal memperbarui profil.');
        }

        redirect('profile');
    }
}
