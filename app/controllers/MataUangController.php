<?php
require_once __DIR__ . '/../models/MataUang.php';

class MataUangController
{
    public function index()
    {
        global $conn;
        if (!is_logged_in()) redirect('login');

        $model = new MataUang($conn);
        $mataUang = $model->all();

        include __DIR__ . '/../views/mata_uang/index.php';
    }

    public function add()
    {
        global $conn;
        if (!is_logged_in()) redirect('login');

        $model = new MataUang($conn);
        $data = [
            'nama_mata_uang' => $_POST['nama'],
            'keterangan' => $_POST['keterangan']
        ];

        $result = $model->create($data);

        echo json_encode($result ? 
            ['success' => 'Mata uang berhasil ditambahkan.'] : 
            ['error' => 'Gagal menambahkan mata uang.']
        );
    }

    public function update()
    {
        global $conn;
        $model = new MataUang($conn);
        $id = $_POST['id'];
        $data = [
            'nama_mata_uang' => $_POST['nama'],
            'keterangan' => $_POST['keterangan']
        ];

        $result = $model->update($id, $data);

        echo json_encode($result ? 
            ['success' => 'Mata uang berhasil diperbarui.'] : 
            ['error' => 'Gagal memperbarui mata uang.']
        );
    }

    public function delete()
    {
        global $conn;
        $model = new MataUang($conn);
        $id = $_POST['id'];

        $result = $model->delete($id);

        echo json_encode($result ? 
            ['success' => 'Mata uang berhasil dihapus.'] : 
            ['error' => 'Gagal menghapus mata uang.']
        );
    }

    public function detail()
    {
        global $conn;
        $model = new MataUang($conn);
        $id = $_GET['id'];
        $mataUang = $model->find($id);
        echo json_encode($mataUang);
    }
}
