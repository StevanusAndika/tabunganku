<?php

return [
    // Authentication Routes
    '' => 'AuthController@index',
    'login' => 'AuthController@login',
    'login-post' => 'AuthController@loginPost',
    'register' => 'AuthController@register',
    'register-post' => 'AuthController@registerPost',
    'logout' => 'AuthController@logout',
    'reset-password' => 'AuthController@resetPassword',
    'reset-password-post' => 'AuthController@resetPasswordPost',

    // Dashboard Routes
    'dashboard' => 'DashboardController@index',

    // Target Routes
    'target' => 'TargetController@index',
    'target-save' => 'TargetController@save',
    'target-update' => 'TargetController@update',
    'target-delete' => 'TargetController@delete',
    'target-detail' => 'TargetController@detail',

    // Kategori Routes
    'kategori' => 'KategoriController@index',
    'kategori-add' => 'KategoriController@add',
    'kategori-update' => 'KategoriController@update',
    'kategori-delete' => 'KategoriController@delete',
    'kategori-detail' => 'KategoriController@detail',

    // Profile Routes
    'profile' => 'ProfileController@index',
    'profile-update' => 'ProfileController@update',

    // Mata Uang Routes
    'mata-uang' => 'MataUangController@index',

    // Tabungan Target Routes
    'tabungan-target' => 'TabunganTargetController@index',
    'tabungan-target-save' => 'TabunganTargetController@save',
    'tabungan-target-update' => 'TabunganTargetController@update',
    'tabungan-target-delete' => 'TabunganTargetController@delete',
    'tabungan-target-detail' => 'TabunganTargetController@detail',

    // Tabungan Routes
    'tabungan' => 'TabunganController@index',
    'tabungan-tambah' => 'TabunganController@store',
    'tabungan-update' => 'TabunganController@update',
    'tabungan-delete' => 'TabunganController@delete',
    'tabungan-detail' => 'TabunganController@detail',
    'tabungan-foto-hapus' => 'TabunganController@hapusFoto',

    'riwayat' => 'RiwayatSaldoController@index',
];
