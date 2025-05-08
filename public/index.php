<?php

// Cek jika ada file .htaccess di folder ini
if (file_exists(__DIR__ . '/.htaccess')) {
    http_response_code(403);
    echo "<h1>Access Forbidden</h1>";
    exit;
}

// Aktifkan session
session_start();

// Load .env
require_once __DIR__ . '/../config/config.php';

// Load koneksi DB
require_once __DIR__ . '/../config/config.php';

// Load functions
require_once __DIR__ . '/../helpers/functions.php';

// Load routes
$routes = require_once __DIR__ . '/../routes/web.php';

// Autoload semua controller
foreach (glob(__DIR__ . '/../app/controllers/*.php') as $filename) {
    require_once $filename;
}

// Dapatkan URL path
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base_path = str_replace('/public', '', dirname($_SERVER['SCRIPT_NAME']));
$uri = '/' . ltrim(str_replace($base_path, '', $uri), '/');

// Hilangkan trailing slash kecuali root
if ($uri !== '/' && substr($uri, -1) === '/') {
    $uri = rtrim($uri, '/');
}

// Cek apakah route tersedia
if (array_key_exists($uri, $routes)) {
    $route = $routes[$uri];
    [$controller, $method] = explode('@', $route);
    $controllerInstance = new $controller();
    $controllerInstance->$method();
} else {
    http_response_code(404);
    echo "<h1>404 - Halaman tidak ditemukan</h1>";
}
