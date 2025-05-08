<?php
// index.php - Root entry point aplikasi

// Load .env
$env = parse_ini_file(__DIR__ . '/.env');

// Define BASE_URL dan APP_NAME sebagai konstanta global
define('BASE_URL', rtrim($env['BASE_URL'], '/'));
define('APP_NAME', $env['APP_NAME'] ?? 'Tabunganku');

// Load helper functions
require_once __DIR__ . '/helpers/functions.php';

// Load konfigurasi dan koneksi database
require_once __DIR__ . '/config/config.php';

// Load routes
$routes = require_once __DIR__ . '/routes/web.php';

// Load middleware
require_once __DIR__ . '/middlewares/authMiddleware.php';

// Ambil path dari URL yang diminta
$requestUri = $_SERVER['REQUEST_URI'];
$basePath = parse_url(BASE_URL, PHP_URL_PATH);
$path = str_replace($basePath, '', $requestUri);
$path = trim(parse_url($path, PHP_URL_PATH), '/');

// Tentukan route key
$routeKey = $path === '' ? '' : $path;

// Periksa apakah route tersedia
if (array_key_exists($routeKey, $routes)) {

    // ✅ Jalankan middleware untuk proteksi login
    authMiddleware($routeKey);

    // Pisahkan controller dan method
    [$controllerName, $method] = explode('@', $routes[$routeKey]);
    $controllerFile = __DIR__ . "/app/controllers/$controllerName.php";

    // Periksa file controller
    if (file_exists($controllerFile)) {
        require_once $controllerFile;
        $controller = new $controllerName();

        // Periksa apakah method ada di controller
        if (method_exists($controller, $method)) {
            $controller->$method(); // Jalankan method
        } else {
            echo "Metode <b>$method</b> tidak ditemukan di $controllerName.";
        }
    } else {
        echo "Controller <b>$controllerName</b> tidak ditemukan.";
    }
} else {
    // Jika route tidak ditemukan, arahkan ke login
    redirect('login');
}
