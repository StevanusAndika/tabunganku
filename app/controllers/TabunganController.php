<?php
require_once __DIR__ . '/../models/Tabungan.php';

class TabunganController
{
    public function index()
    {
        global $conn;
        if (!is_logged_in()) redirect('login');

        $model = new Tabungan($conn);
        $tabungan = $model->allByUser($_SESSION['user_id']);

        include __DIR__ . '/../views/tabungan/index.php';
    }

    public function add()
    {
        global $conn;

        if (!is_logged_in()) redirect('login');
        $user_id = $_SESSION['user_id'];

        // Upload foto
        $foto = $_FILES['foto'];
        $fotoName = uniqid() . '_' . basename($foto['name']);
        $uploadDir = __DIR__ . '/../../public/foto_tabungan/';
        $uploadPath = $uploadDir . $fotoName;
        move_uploaded_file($foto['tmp_name'], $uploadPath);

        // Hitung nominal pengisian per periode
        $tanggal_awal = new DateTime($_POST['tanggal_mulai']);
        $tanggal_akhir = new DateTime($_POST['tanggal_berakhir']);
        $interval = $tanggal_awal->diff($tanggal_akhir);
        $jumlah_tabungan = (float) $_POST['jumlah_tabungan'];
        $metode = $_POST['rencana_pengisian'];

        switch ($metode) {
            case 'harian':
                $total_periode = $interval->days;
                break;
            case 'mingguan':
                $total_periode = ceil($interval->days / 7);
                break;
            case 'bulanan':
                $total_periode = max(1, (($interval->y * 12) + $interval->m));
                break;
            default:
                $total_periode = 1;
        }

        $nominal_pengisian = ($total_periode > 0) ? $jumlah_tabungan / $total_periode : $jumlah_tabungan;

        $data = [
            'nama_tabungan' => $_POST['nama_tabungan'],
            'jumlah_tabungan' => $jumlah_tabungan,
            'rencana_pengisian' => $metode,
            'nominal_pengisian' => $nominal_pengisian,
            'kategori_id' => $_POST['kategori_id'],
            'user_id' => $user_id,
            'id_mata_uang' => $_POST['id_mata_uang'],
            'perkiraan_berakhir' => $_POST['tanggal_berakhir'],
            'status_tabungan' => 'berlangsung',
            'foto_tabungan' => $fotoName,
            'path_foto' => 'public/foto_tabungan/' . $fotoName
        ];

        $model = new Tabungan($conn);
        $result = $model->create($data);

        if ($result) {
            echo json_encode(['success' => 'Tabungan berhasil ditambahkan.']);
        } else {
            echo json_encode(['error' => 'Gagal menambahkan tabungan.']);
        }
    }

    public function detail()
    {
        global $conn;
        $model = new Tabungan($conn);
        $id = $_GET['id'];
        $tabungan = $model->find($id);
        echo json_encode($tabungan);
    }
}
