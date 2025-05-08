<?php
// middlewares/authMiddleware.php

function authMiddleware($routeKey)
{
    // Daftar route yang tidak butuh login
    $publicRoutes = [
        '', 'login', 'login-post', 'register', 'register-post', 'reset-password', 'reset-password-post'
    ];

    // Jika route bukan public dan user belum login
    if (!in_array($routeKey, $publicRoutes) && !is_logged_in()) {
        set_flash('error', 'Kamu harus login terlebih dahulu.');
        redirect('login');
    }
}
