<?php
require_once __DIR__ . '/../models/TabunganTarget.php';
require_once __DIR__ . '/../models/Kategori.php';
require_once __DIR__ . '/../models/MataUang.php';

class TabunganTargetController
{
    public function index()
    {
        global $conn;
        if (!is_logged_in()) redirect('login');

        $user = $_SESSION['user'];
        $model = new TabunganTarget($conn);
        $kategori = $model->allByUser($user['id']);
        $kategoriModel = new Kategori($conn);
        $kategoriList = $kategoriModel->all();
        $mataUangModel = new MataUang($conn);
        $mataUangList = $mataUangModel->all();

        include __DIR__ . '/../views/tabungan_target/index.php';
    }

    public function save()
    {
        global $conn;

        $data = [
            'user_id' => $_SESSION['user']['id'],
            'nama_target' => $_POST['nama_target'],
            'nominal_target' => $_POST['nominal_target'],
            'tanggal_dimulai' => $_POST['tanggal_dimulai'],
            'tanggal_berakhir' => $_POST['tanggal_berakhir'],
            'metode_menabung' => $_POST['metode_menabung'],
            'kategori_id' => $_POST['kategori_id'] ?? null,
            'mata_uang_id' => $_POST['mata_uang_id'] ?? null,
        ];

        if (empty($data['nama_target']) || empty($data['nominal_target']) || empty($data['tanggal_dimulai']) || empty($data['tanggal_berakhir'])) {
            echo json_encode(['error' => 'Semua field harus diisi']);
            return;
        }

        // Validasi tanggal_dimulai tidak boleh lebih dari tanggal_berakhir
        $tanggalDimulai = new DateTime($data['tanggal_dimulai']);
        $tanggalBerakhir = new DateTime($data['tanggal_berakhir']);
        if ($tanggalDimulai > $tanggalBerakhir) {
            echo json_encode(['error' => 'Tanggal dimulai tidak boleh lebih dari tanggal berakhir']);
            return;
        }

        $hasil = $this->calculateTabungan($data['nominal_target'], $data['tanggal_dimulai'], $data['tanggal_berakhir'], $data['metode_menabung']);
        $data['hasil_kalkulasi'] = $hasil['per_hari'];
        $data['target_tercapai'] = $hasil['persentase'] >= 100 ? 1 : 0;
        $data['durasi'] = $hasil['durasi'];

        $model = new TabunganTarget($conn);
        $result = $model->create($data);

        echo json_encode($result ? ['success' => 'Data berhasil disimpan'] : ['error' => 'Gagal menyimpan data']);
    }

    public function update()
    {
        global $conn;

        $data = [
            'nama_target' => $_POST['nama_target'],
            'nominal_target' => $_POST['nominal_target'],
            'tanggal_dimulai' => $_POST['tanggal_dimulai'],
            'tanggal_berakhir' => $_POST['tanggal_berakhir'],
            'metode_menabung' => $_POST['metode_menabung'],
            'kategori_id' => $_POST['kategori_id'] ?? null,
            'mata_uang_id' => $_POST['mata_uang_id'] ?? null,
        ];

        // Validasi tanggal_dimulai tidak boleh lebih dari tanggal_berakhir
        $tanggalDimulai = new DateTime($data['tanggal_dimulai']);
        $tanggalBerakhir = new DateTime($data['tanggal_berakhir']);
        if ($tanggalDimulai > $tanggalBerakhir) {
            echo json_encode(['error' => 'Tanggal dimulai tidak boleh lebih dari tanggal berakhir']);
            return;
        }

        $hasil = $this->calculateTabungan($data['nominal_target'], $data['tanggal_dimulai'], $data['tanggal_berakhir'], $data['metode_menabung']);
        $data['hasil_kalkulasi'] = $hasil['per_hari'];
        $data['durasi'] = $hasil['durasi'];

        $hari_berjalan = $this->getHariBerjalan($data['tanggal_dimulai'], $data['tanggal_berakhir']);
        $data['saldo_terkumpul'] = $hari_berjalan * $hasil['per_hari'];

        $persentase = ($data['saldo_terkumpul'] / $data['nominal_target']) * 100;
        $data['target_tercapai'] = $persentase >= 100 ? 1 : 0;

        $model = new TabunganTarget($conn);
        $result = $model->update($_POST['id'], $data);

        echo json_encode($result ? ['success' => 'Data berhasil diperbarui'] : ['error' => 'Gagal memperbarui data']);
    }

    public function delete()
    {
        global $conn;
        $id = $_POST['id'] ?? null;

        if (!$id) {
            echo json_encode(['error' => 'ID tidak ditemukan']);
            return;
        }

        $model = new TabunganTarget($conn);
        $deleted = $model->delete($id);

        echo json_encode($deleted ? ['success' => 'Data berhasil dihapus'] : ['error' => 'Gagal menghapus data']);
    }

    public function detail()
    {
        global $conn;
        $id = $_GET['id'] ?? null;

        if (!$id) {
            echo json_encode(['error' => 'ID tidak ditemukan']);
            return;
        }

        $model = new TabunganTarget($conn);
        $detail = $model->find($id);

        echo json_encode($detail ? ['data' => $detail] : ['error' => 'Data tidak ditemukan']);
    }

    private function calculateTabungan($nominal_target, $tanggal_mulai, $tanggal_akhir, $metode)
    {
        $start = new DateTime($tanggal_mulai);
        $end = new DateTime($tanggal_akhir);
        $interval = $start->diff($end);
        $durasi = "{$interval->y} tahun, {$interval->m} bulan, {$interval->d} hari";

        if ($metode === 'harian') {
            $total = $interval->days + 1;
        } elseif ($metode === 'mingguan') {
            $total = ceil(($interval->days + 1) / 7);
        } elseif ($metode === 'bulanan') {
            $total = max(1, ($interval->y * 12) + $interval->m);
        } else {
            $total = 1;
        }

        $per_hari = $nominal_target / $total;
        $sudah_ditabung = 0;
        $persentase = ($sudah_ditabung / $nominal_target) * 100;

        return [
            'per_hari' => round($per_hari, 2),
            'persentase' => round($persentase, 2),
            'durasi' => $durasi
        ];
    }

    private function getHariBerjalan($tanggal_mulai, $tanggal_berakhir)
    {
        $today = new DateTime();
        $start = new DateTime($tanggal_mulai);
        $end = new DateTime($tanggal_berakhir);

        if ($today < $start) {
            return 0;
        }

        $akhir = $today > $end ? $end : $today;
        return $start->diff($akhir)->days + 1;
    }
}
