<?php
require_once __DIR__ . '/../models/RiwayatSaldo.php';
require_once __DIR__ . '/../models/Tabungan.php';

class RiwayatSaldoController
{
   public function index()
    {
        global $conn;
        if (!is_logged_in()) redirect('login');

        //$tabungan_id = $_GET['tabungan_id'];
        $riwayat = new RiwayatSaldo($conn);
        //$data = $riwayat->allByTabungan($tabungan_id);

        include __DIR__ . '/../views/riwayat/index.php';
    }


    public function store()
    {
        global $conn;
        if (!is_logged_in()) redirect('login');

        $tabungan_id = $_POST['tabungan_id'];
        $nominal = floatval($_POST['nominal']);
        $keterangan = $_POST['keterangan'];
        $tanggal = $_POST['tanggal_saldo'];

        $riwayat = new RiwayatSaldo($conn);
        $tabungan = new Tabungan($conn);

        // Simpan riwayat
        $riwayat->create([
            'tabungan_id' => $tabungan_id,
            'nominal' => $nominal,
            'keterangan' => $keterangan,
            'tanggal_saldo' => $tanggal
        ]);

        // Hitung total saldo & update persentase
        $total_saldo = $riwayat->totalSaldo($tabungan_id);
        $tabungan->updateProgress($tabungan_id, $total_saldo);

        echo json_encode(['success' => 'Saldo berhasil ditambahkan.']);
    }

    public function list()
    {
        global $conn;
        $riwayat = new RiwayatSaldo($conn);
        $data = $riwayat->allByTabungan($_GET['tabungan_id']);
        echo json_encode($data);
    }
}
