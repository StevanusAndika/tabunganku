<?php
// Pastikan session sudah dimulai

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user'])) {
    // Redirect ke halaman login jika belum login
    header('Location: login.php');
    exit;
}

// Ambil data pengguna dari sesi
$user = $_SESSION['user'];
$username = $user['username'];
$email = $user['email'];


?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= APP_NAME ?> | Kategori </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= asset('assets/vendors/feather/feather.css') ?>">
<link rel="stylesheet" href="<?= asset('assets/vendors/mdi/css/materialdesignicons.min.css') ?>">
<link rel="stylesheet" href="<?= asset('assets/vendors/ti-icons/css/themify-icons.css') ?>">
<link rel="stylesheet" href="<?= asset('assets/vendors/font-awesome/css/font-awesome.min.css') ?>">
<link rel="stylesheet" href="<?= asset('assets/vendors/typicons/typicons.css') ?>">
<link rel="stylesheet" href="<?= asset('assets/vendors/simple-line-icons/css/simple-line-icons.css') ?>">
<link rel="stylesheet" href="<?= asset('assets/vendors/css/vendor.bundle.base.css') ?>">
<link rel="stylesheet" href="<?= asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') ?>">

<!-- Plugin DataTables -->
<link rel="stylesheet" href="<?= asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') ?>">
<link rel="stylesheet" href="<?= asset('assets/js/select.dataTables.min.css') ?>">

<!-- Main style -->
<link rel="stylesheet" href="<?= asset('assets/css/style.css') ?>">

<!-- Favicon -->
<link rel="shortcut icon" href="<?= asset('assets/images/favicon.png') ?>" />
<style>
 /* Default Style - Desktop and larger screens */
 .skeleton {
    background-color: #e2e2e2;
    border-radius: 4px;
    animation: pulse 1.5s infinite;
  }

  .skeleton-text {
    height: 16px;
    margin-bottom: 10px;
    width: 100%;
  }

  @keyframes pulse {
    0% {
      background-color: #f0f0f0;
    }
    50% {
      background-color: #e0e0e0;
    }
    100% {
      background-color: #f0f0f0;
    }
  }

  .sortable {
    cursor: pointer;
  }

  .mdi {
    vertical-align: middle;
  }


</style>
  </head>
  <body class="with-welcome-text">
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding px-3 d-flex align-items-center justify-content-between">
            <div class="ps-lg-3">
              
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/star-admin-pro/"><i class="ti-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="ti-close text-white"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
              <span class="icon-menu"></span>
            </button>
          </div>
          <div>
            <a class="navbar-brand brand-logo" href="#">
            <img src="<?= asset('assets/images/logo.svg') ?>" alt="logo" />

            </a>
            <a class="navbar-brand brand-logo-mini" href="index.html">
              <img src="assets/images/logo-mini.svg" alt="logo" />
            </a>
          </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-top">
          <ul class="navbar-nav">
            <li class="nav-item fw-semibold d-none d-lg-block ms-0">
           
              <h3 class="welcome-sub-text"> </h3>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">
           
            <li class="nav-item d-none d-lg-block">
             
            </li>
           
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
              <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="<?= isset($profile['path_photo']) && file_exists($profile['path_photo']) ? $profile['path_photo'] : 'public/assets/default.jpg'; ?>" class="rounded-circle img-thumbnail" style="width: 40px; height: 40px;" alt="Profile image"> 

              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                <img  src="<?= isset($profile['path_photo']) && file_exists($profile['path_photo']) ? $profile['path_photo'] : 'public/assets/default.jpg'; ?>"  style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;" alt="Profile image">
                  <p class="mb-1 mt-3 fw-semibold"><?php echo $username; ?></p>
                  <p class="fw-light text-muted mb-0"><?php echo $email; ?></p>

                </div>
                <a href="<?= base_url('profile') ?>" class="dropdown-item">
                <i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile 
                <span class="badge badge-pill badge-danger">1</span>
              </a>

                
                <a class="dropdown-item" href="logout">
                <a class="dropdown-item" href="#" id="signout-btn">
                  <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out
              </a>

              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
              <li class="nav-item">
        <a class="nav-link" href="<?= base_url('dashboard') ?>">
            <i class="mdi mdi-grid-large menu-icon"></i>
            <span class="menu-title">Dashboard</span>
        </a>
    </li>

    <li class="nav-item nav-category">Menu</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Kategori</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?= base_url('/kategori') ?>">Buat Kategori</a></li>

                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Tabungan</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="<?= base_url('/tabungan') ?>">Buat Dan Kelola Data</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <i class="menu-icon mdi mdi-chart-line"></i>
                <span class="menu-title">Kakulator Target</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link"  href="<?= base_url('/tabungan-target')?>">Lihat perkiraan Target Uang</a></li>
                </ul>
              </div>
            </li>
           
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon mdi mdi-account-circle-outline"></i>
                <span class="menu-title">Profil</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?= base_url('/profile')?>">Liat Profil </a></li>
                  
                </ul>
              </div>

              <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#currency" aria-expanded="false" aria-controls="currency">
                <i class="menu-icon mdi mdi-currency-usd"></i>
                <span class="menu-title">Mata Uang</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="currency">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?= base_url('/mata-uang') ?>">Lihat Mata Uang</a></li>
                 
                </ul>
              </div>
            </li>

              
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('logout') ?>" id="dashboard-btn">
                <i class="menu-icon mdi mdi-logout"></i>
                <span class="menu-title">Logout</span>
              </a>
            </li>
          </ul>
          </ul>
        </nav>
        <div class="main-panel">
    <div class="content-wrapper">
    <div class="page-header">
      
            <h2 class="page-title">Data Tabungan</h2><br>
           
        </div>
        <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
      
         
      <!-- Tombol Tambah Data -->
<div class="d-flex justify-content-end mb-3">
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="mdi mdi-plus"></i> Tambah Data
    </button>
</div>

<div class="table-responsive">
    <table class="table table-striped" id="kategoriTable">
        <thead>
            <tr>
                <th class="sortable" onclick="sortTable(0)"> No <i class="mdi mdi-swap-vertical"></i></th>
                <th class="sortable" onclick="sortTable(1)"> Nama Target <i class="mdi mdi-swap-vertical"></i></th>
                <th class="sortable" onclick="sortTable(2)"> Jumlah Target <i class="mdi mdi-swap-vertical"></i></th>
                <th class="sortable" onclick="sortTable(3)"> Metode <i class="mdi mdi-swap-vertical"></i></th>
                <th class="sortable" onclick="sortTable(4)">Saldo Per Hari/Minggu/Bulan <i class="mdi mdi-swap-vertical"></i></th>
                <th class="sortable" onclick="sortTable(5)">Tanggal Mulai<i class="mdi mdi-swap-vertical"></i></th>
                <th class="sortable" onclick="sortTable(6)">Tanggal Berakhir<i class="mdi mdi-swap-vertical"></i></th>
                <th class="sortable" onclick="sortTable(7)"> Durasi<i class="mdi mdi-swap-vertical"></i></th>
                <th class="sortable" onclick="sortTable(8)"> Mata Uang<i class="mdi mdi-swap-vertical"></i></th>
                <th class="sortable" onclick="sortTable(9)"> Aksi<i class="mdi mdi-swap-vertical"></i></th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($kategori)) : ?>
                <tr><td colspan="9" class="text-center">Data Tabungan Target belum tersedia.</td></tr>
            <?php else : ?>
                <?php $no = 1; foreach ($kategori as $item) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($item['nama_target']) ?></td>
                        <td>Rp <?= number_format($item['nominal_target'], 0, ',', '.') ?></td>
                        <td><?= htmlspecialchars($item['metode_menabung']) ?></td>
                        <td>Rp <?= number_format($item['hasil_kalkulasi'], 0, ',', '.') ?></td>
                        <td><?= htmlspecialchars($item['tanggal_dimulai']) ?></td>
                        <td><?= htmlspecialchars($item['tanggal_berakhir']) ?></td>
                        <td><?= htmlspecialchars($item['durasi']) ?></td>
                        <td><?= htmlspecialchars($item['mata_uang']) ?></td> 
                        <td>
                            <button class="btn btn-info btn-sm btn-detail" data-id="<?= $item['id'] ?>">Detail</button>
                            <button class="btn btn-warning btn-sm btn-edit" data-id="<?= $item['id'] ?>">Edit</button>
                            <button class="btn btn-danger btn-sm btn-delete" data-id="<?= $item['id'] ?>">Hapus</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formTambah" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Target Tabungan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label>Nama Target</label>
                        <input type="text" name="nama_target" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label>Nominal Target</label>
                        <input type="number" name="nominal_target" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label>Tanggal Dimulai</label>
                        <input type="date" name="tanggal_dimulai" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label>Tanggal Berakhir</label>
                        <input type="date" name="tanggal_berakhir" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label>Metode Menabung</label>
                        <select name="metode_menabung" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            <option value="harian">Harian</option>
                            <option value="mingguan">Mingguan</option>
                            <option value="bulanan">Bulanan</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label>Mata Uang</label>
                        <select name="mata_uang" class="form-control" required> 
                            <option value="">-- Pilih  Mata Uang --</option>
                            <?php foreach ($mataUangList as $mataUang): ?>
                          <option value="<?= htmlspecialchars($mataUang['id']) ?>">
                              <?= htmlspecialchars($mataUang['nama_mata_uang']) ?>
                          </option>
                      <?php endforeach; ?>

                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for = "kategori_id">Kategori</label>
                        <select name="kategori_id" id="kategori_id" class="form-control" required>
                            <option value="">-- Pilih Kategori --</option>
                            <?php foreach ($kategoriList as $item) : ?>
                                <option value="<?= htmlspecialchars($item['id']) ?>"><?= htmlspecialchars($item['nama_kategori']) ?>
                              </option>
                              <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Simpan</button>
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formEdit" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Target Tabungan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="edit_id">

                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label>Nama Target</label>
                        <input type="text" name="nama_target" id="edit_nama_target" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label>Nominal Target</label>
                        <input type="number" name="nominal_target" id="edit_nominal_target" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label>Tanggal Dimulai</label>
                        <input type="date" name="tanggal_dimulai" id="edit_tanggal_dimulai" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label>Tanggal Berakhir</label>
                        <input type="date" name="tanggal_berakhir" id="edit_tanggal_berakhir" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label>Metode Menabung</label>
                        <select name="metode_menabung" id="edit_metode_menabung" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            <option value="harian">Harian</option>
                            <option value="mingguan">Mingguan</option>
                            <option value="bulanan">Bulanan</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label>Mata Uang</label>
                        <select name="mata_uang" id="edit_mata_uang" class="form-control" required>
                            <option value="">-- Pilih  Mata Uang --</option>
                            <?php foreach ($mataUangList as $mataUang): ?>
                          <option value="<?= htmlspecialchars($mataUang['id']) ?>">
                              <?= htmlspecialchars($mataUang['nama_mata_uang']) ?>
                          </option>
                      <?php endforeach; ?>
                            <!-- Tambahkan opsi lain jika perlu -->
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label>Kategori</label>
                        <select name="kategori" id="edit_kategori" class="form-control" required>
                            <option value="">-- Pilih Kategori --</option>
                            <?php foreach ($kategoriList as $item) : ?>
                                <option value="<?= htmlspecialchars($item['id']) ?>"><?= htmlspecialchars($item['nama_kategori']) ?>
                              </option>
                            <?php endforeach; ?>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label>Saldo Terkumpul</label>
                        <input type="number" name="saldo_terkumpul" id="edit_saldo_terkumpul" class="form-control" required>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="submit">Update</button>
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
            </div>
        </form>
    </div>
</div>


<!-- Modal Detail -->
<div class="modal fade" id="modalDetail" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Kategori</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p><strong>Nama Tabungan:</strong> <span id="detailNama"></span></p>
        <p><strong>Nominal Target:</strong> <span id="detailNominal"></span></p>
        <p><strong>Metode Menabung:</strong> <span id="detailMetode"></span></p>
        <p><strong>Saldo Per Hari/Minggu/Bulan:</strong> <span id="detailSaldo"></span></p>
        <p><strong>Tanggal Dimulai:</strong> <span id="detailTanggalDimulai"></span></p>
        <p><strong>Tanggal Berakhir:</strong> <span id="detailTanggalBerakhir"></span></p>
        <p><strong>Durasi:</strong> <span id="detailDurasi"></span></p>
        <p><strong>Mata Uang:</strong> <span id="detailMataUang"></span></p>
        <p><strong>Kategori:</strong> <span id="detailKategori"></span></p>
        <p><strong>Saldo Terkumpul:</strong> <span id="detailSaldoTerkumpul"></span></p>
        <p><strong >Hasil Kalkulasi:</strong> <span id="detailHasilKalkulasi"></span></p>
        <p><strong>Target Tercapai:</strong> <span id="detailTargetTercapai"></span></p>

        <p><strong>Dibuat Pada:</strong> <span id="detailCreatedAt"></span></p> 
       
      </div>
    </div>
  </div>
</div>



</div>
</div>




          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
              <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
          Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.
        </span>
        <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">
          Copyright © <?= date('Y'); ?>. All rights reserved.
        </span>
      </div>
    </footer>

          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= asset('assets/vendors/js/vendor.bundle.base.js') ?>"></script>
<script src="<?= asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') ?>"></script>

<!-- Plugin js for this page -->
<script src="<?= asset('assets/vendors/chart.js/chart.umd.js') ?>"></script>
<script src="<?= asset('assets/vendors/progressbar.js/progressbar.min.js') ?>"></script>

<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="<?= asset('assets/js/off-canvas.js') ?>"></script>
<script src="<?= asset('assets/js/template.js') ?>"></script>
<script src="<?= asset('assets/js/settings.js') ?>"></script>
<script src="<?= asset('assets/js/hoverable-collapse.js') ?>"></script>
<script src="<?= asset('assets/js/todolist.js') ?>"></script>
<!-- endinject -->

<!-- Custom js for this page-->
<script src="<?= asset('assets/js/jquery.cookie.js') ?>" type="text/javascript"></script>
<script src="<?= asset('assets/js/dashboard.js') ?>"></script>
<!-- <script src="<?= asset('assets/js/Chart.roundedBarCharts.js') ?>"></script> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- End custom js for this page-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
// JavaScript functionality for add, edit, delete, and detail actions
document.addEventListener('DOMContentLoaded', function () {
    // Tambah Data
    document.getElementById('formTambah').addEventListener('submit', function (e) {
        e.preventDefault();
        const form = new FormData(this);
        fetch('tabungan-target-save', {
            method: 'POST',
            body: new URLSearchParams(form)
        })
        .then(res => res.json())
        .then(res => {
            Swal.fire({
                icon: res.success ? 'success' : 'error',
                title: res.success ? 'Berhasil!' : 'Gagal!',
                text: res.success || res.error
            }).then(() => {
                if (res.success) location.reload();
            });
        });
    });

    // Edit Data
    document.querySelectorAll('.btn-edit').forEach(btn => {
        btn.addEventListener('click', function () {
            const id = this.dataset.id;
            fetch(`tabungan-target-detail?id=${id}`)
                .then(res => res.json())
                .then(data => {
                    if (data.error) {
                        Swal.fire('Error', data.error, 'error');
                    } else {
                        document.getElementById('edit_id').value = data.id;
                        document.getElementById('edit_nama_target').value = data.nama_target;
                        document.getElementById('edit_nominal_target').value = data.nominal_target;
                        document.getElementById('edit_tanggal_dimulai').value = data.tanggal_dimulai;
                        document.getElementById('edit_tanggal_berakhir').value = data.tanggal_berakhir;
                        document.getElementById('edit_metode_menabung').value = data.metode_menabung;
                        new bootstrap.Modal(document.getElementById('modalEdit')).show();
                    }
                });
        });
    });

    // Submit Edit
    document.getElementById('formEdit').addEventListener('submit', function (e) {
        e.preventDefault();
        const form = new FormData(this);
        fetch('tabungan-target-update', {
            method: 'POST',
            body: new URLSearchParams(form)
        })
        .then(res => res.json())
        .then(res => {
            Swal.fire({
                icon: res.success ? 'success' : 'error',
                title: res.success ? 'Berhasil!' : 'Gagal!',
                text: res.success || res.error
            }).then(() => {
                if (res.success) location.reload();
            });
        });
    });

    // Hapus Data
    document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', function () {
            const id = this.dataset.id;
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('tabungan-target-delete', {
                        method: 'POST',
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                        body: `id=${id}`
                    })
                    .then(res => res.json())
                    .then(res => {
                        Swal.fire({
                            icon: res.success ? 'success' : 'error',
                            title: res.success ? 'Berhasil!' : 'Gagal!',
                            text: res.success || res.error
                        }).then(() => {
                            if (res.success) location.reload();
                        });
                    });
                }
            });
        });
    });

     // Detail Kategori
     $(document).on('click', '.btn-detail', function () {
        const id = $(this).data('id');
        $.get('tabungan-target-detail?id=' + id, function (data) {
    if (!data.data) {
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: data.error || 'Data tidak ditemukan',
        });
        return;
    }

    const detail = data.data;

    $('#detailNama').text(detail.nama_target);
    $('#detailNominal').text('Rp ' + Number(detail.nominal_target).toLocaleString());
    $('#detailMetode').text(detail.metode_menabung);
    $('#detailSaldo').text('Rp ' + Number(detail.hasil_kalkulasi).toLocaleString());
    $('#detailTanggalDimulai').text(detail.tanggal_dimulai);
    $('#detailTanggalBerakhir').text(detail.tanggal_berakhir);
    $('#detailDurasi').text(detail.durasi);
    $('#detailMataUang').text(detail.nama_mata_uang ?? '-');
    $('#detailKategori').text(detail.nama_kategori ?? '-');
    $('#detailSaldoTerkumpul').text('Rp ' + Number(detail.saldo_terkumpul).toLocaleString());
    $('#detailHasilKalkulasi').text('Rp ' + Number(detail.hasil_kalkulasi).toLocaleString());
    $('#detailTargetTercapai').text(detail.target_tercapai ? '100%' : '0%');
    $('#detailCreatedAt').text(detail.created_at);
    $('#detailUpdatedAt').text(detail.updated_at ?? '-');

    $('#modalDetail').modal('show');
});


    });

});
</script>

</body>
</html>
