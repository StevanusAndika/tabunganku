<?php

// Fungsi untuk ambil base URL dari .env
function base_url($path = '')
{
    $env = parse_ini_file(__DIR__ . '/../.env');
    $base = rtrim($env['BASE_URL'], '/');
    $path = ltrim($path, '/');
    return $base . '/' . $path;
}

// Fungsi redirect
function redirect($path = '')
{
    header("Location: " . base_url($path));
    exit;
}

// Fungsi cek login
function is_logged_in()
{
    return isset($_SESSION['user']);
}

// Fungsi untuk set flash message
function set_flash($key, $message) {
    $_SESSION['flash'][$key] = $message;
}

function get_flash($key) {
    if (isset($_SESSION['flash'][$key])) {
        $msg = $_SESSION['flash'][$key];
        unset($_SESSION['flash'][$key]);
        return $msg;
    }
    return null;
}

function has_flash($key) {
    return isset($_SESSION['flash'][$key]);
}


function asset($path = '') {
    return BASE_URL . '/public/' . ltrim($path, '/');
}
function url($path = '') {
    return BASE_URL . '/' . ltrim($path, '/');
}
