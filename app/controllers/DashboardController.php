<?php
require_once __DIR__ . '/ProfileController.php'; // Untuk UNIX-like atau Windows


class DashboardController
{
    public function index()
    {
        if (!is_logged_in()) redirect('login');

        include __DIR__ . '/../views/dashboard/index.php';
    }
}
