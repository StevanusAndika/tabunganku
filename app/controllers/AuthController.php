<?php

class AuthController
{
    public function index()
    {
        if (is_logged_in()) {
            redirect('dashboard');
        } else {
            redirect('login');
        }
    }

    public function login()
    {
        include __DIR__ . '/../views/auth/login.php';
    }

    public function loginPost()
    {
        global $conn;
    
        // Ambil inputan "login" (bisa username atau email)
        $login = trim($_POST['login']);
        $password = trim($_POST['password']);
    
        if (empty($login) || empty($password)) {
            set_flash('error', 'Username/email dan password wajib diisi!');
            redirect('login');
            return;
        }
    
        // Cek user berdasarkan email atau username
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
        $stmt->execute([$login, $login]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            set_flash('success', 'Login berhasil!');
            redirect('dashboard');
        } else {
            set_flash('error', 'Username, email, atau password salah');
            redirect('login');
        }
    }
    

    public function register()
    {
        include __DIR__ . '/../views/auth/register.php';
    }

    public function registerPost()
    {
        global $conn;
    
        $username = trim($_POST['login']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
    
        if (empty($username) || empty($email) || empty($password)) {
            set_flash('error', 'Semua field wajib diisi!');
            redirect('register');
            return;
        }
    
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            set_flash('error', 'Format email tidak valid!');
            redirect('register');
            return;
        }
    
        if (strlen($password) < 8) {
            set_flash('error', 'Password minimal 8 karakter!');
            redirect('register');
            return;
        }
    
        // Cek apakah email atau username sudah digunakan
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
        $stmt->execute([$email, $username]);
        $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($existingUser) {
            set_flash('error', 'Username atau email sudah terdaftar!');
            redirect('register');
            return;
        }
    
        // Enkripsi password dan simpan user baru
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $hashedPassword]);
    
        set_flash('success', 'Registrasi berhasil! Silakan login.');
        redirect('login');
    }
    

    public function resetPassword()
    {
        include __DIR__ . '/../views/auth/reset-password.php';
    }

    public function resetPasswordPost()
{
    global $conn;

    $email = trim($_POST['login']);
    $newPassword = trim($_POST['password']);

    if (empty($email) || empty($newPassword)) {
        set_flash('error', 'Email dan password baru wajib diisi.');
        redirect('reset-password');
        return;
    }

    // Cek apakah email terdaftar
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        set_flash('error', 'Email tidak ditemukan di database.');
        redirect('reset-password');
        return;
    }

    // Update password jika email ditemukan
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
    $stmt->execute([$hashedPassword, $email]);

    set_flash('success', 'Password berhasil direset.');
    redirect('login');
}

    public function logout()
    {
        session_destroy();
        redirect('login');
    }
}
