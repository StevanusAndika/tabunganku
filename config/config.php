<?php
// config/config.php

// Load env
$env = parse_ini_file(__DIR__ . '/../.env');

// Simpan data dari .env ke variabel global
$appName = $env['APP_NAME'] ?? 'Tabunganku';
$appEnv  = $env['APP_ENV'] ?? 'local';
$dbHost  = $env['DB_HOST'] ?? 'localhost';
$dbName  = $env['DB_NAME'] ?? 'tabunganku_db';
$dbUser  = $env['DB_USER'] ?? 'root';
$dbPass  = $env['DB_PASS'] ?? '';
$dbPort  = $env['DB_PORT'] ?? 3306;
$sessionLifetime = $env['SESSION_LIFETIME'] ?? 3600; // default 1 jam

// Koneksi PDO
try {
    $conn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Global variables
    $GLOBALS['conn'] = $conn;
    $GLOBALS['APP_NAME'] = $appName;
    $GLOBALS['APP_ENV'] = $appEnv;

} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}

// Session Config
ini_set('session.gc_maxlifetime', $sessionLifetime);
session_set_cookie_params($sessionLifetime);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
