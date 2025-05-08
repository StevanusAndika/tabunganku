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
    <title><?= APP_NAME ?> | Target Tabungan </title>
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
            <a class="navbar-brand brand-logo" href="index.html">
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
                <img src="<?= asset('assets/images/faces/face8.jpg') ?>" alt="logo" class="img-xs rounded-circle"/>

              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="assets/images/faces/face8.jpg" alt="Profile image">
                  <p class="mb-1 mt-3 fw-semibold"><?php echo $username; ?></p>
                  <p class="fw-light text-muted mb-0"><?php echo $email; ?></p>

                </div>
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Messages</a>
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Activity</a>
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a>
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
                  <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <i class="menu-icon mdi mdi-chart-line"></i>
                <span class="menu-title">Riwayat Tabungan</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">Lihat Riwayat</a></li>
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
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html">Liat Profil </a></li>
                  
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="docs/documentation.html">
                <i class="menu-icon mdi mdi-logout"></i>
                <span class="menu-title">Logout</span>
              </a>
            </li>
          </ul>
        </nav>
        <div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h2 class="page-title">Tabungan Target</h2><br>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">

            <!-- Tombol Tambah -->
            <!-- Tombol Tambah -->
        <!-- Tombol Tambah -->
        <div class="d-flex justify-content-end mb-3">
              <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambah">
                <i class="mdi mdi-plus"></i> Tambah Target
              </button>
            </div>

<!-- Table -->
<div class="table-responsive">
  <table class="table table-striped" id="targetTable">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Target</th>
        <th>Nominal</th>
        <th>Metode</th>
        <th>Per Hari/Minggu/Bulan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody id="targetBody">
      <?php if (empty($kategori)) : ?>
        <tr><td colspan="6" class="text-center">Belum ada data.</td></tr>
      <?php else : ?>
        <?php $no = 1; foreach ($kategori as $item) : ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($item['nama_target']) ?></td>
            <td>Rp <?= number_format($item['nominal_target'], 0, ',', '.') ?></td>
            <td><?= htmlspecialchars($item['metode_menabung']) ?></td>
            <td>Rp <?= number_format($item['hasil_kalkulasi'], 0, ',', '.') ?></td>
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

        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalTambah" tabindex="-1">
  <div class="modal-dialog">
    <form id="formTambah">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Tabungan Target</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="text" name="nama_target" class="form-control mb-2" placeholder="Nama Target" required>
          <input type="number" name="nominal_target" class="form-control mb-2" placeholder="Nominal Target" required>
          <input type="date" name="tanggal_dimulai" class="form-control mb-2" required>
          <input type="date" name="tanggal_berakhir" class="form-control mb-2" required>
          <select name="metode_menabung" class="form-control mb-2" required>
            <option value="">Pilih Metode</option>
            <option value="harian">Harian</option>
            <option value="mingguan">Mingguan</option>
            <option value="bulanan">Bulanan</option>
          </select>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="saveButton">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>




<!-- Modal Detail -->
<div class="modal fade" id="modalDetail" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Target Tabungan</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p><strong>nama target</strong> <span id="detailNama"></span></p>
        <p><strong>Nominal Target:</strong> <span id="detailDeskripsi"></span></p>
        <p><strong>Tanggal Dimulai:</strong> <span id="detailTanggalDimulai"></span></p>
        <p><strong>Tanggal Berakhir:</strong> <span id="detailTanggalBerakhir"></span></p>
        <p><strong>Metode Menabung:</strong> <span id="detailMetode"></span></p>
        <p><strong>Target Tercapai:</strong> <span id="detailTargetTercapai"></span></p>
        <p><strong>Hasil Kalkulasi:</strong> <span id="detailHasilKalkulasi"></span></p>
        <p><strong>Persentase:</strong> <span id="detailPersentase"></span></p>
        <p><strong>Created At:</strong> <span id="detailCreatedAt"></span></p>

       
      </div>
    </div>
  </div>
</div>
<!-- Modal Edit -->
<div class="modal fade" id="updateButton" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content p-3">
      <h5>Edit Target</h5>
      <form id="formEdit">
        <input type="hidden" name="id" id="edit_id">
        <input type="text" name="nama_target" id="edit_nama" class="form-control mb-2" placeholder="Nama Target">
        <input type="number" name="nominal_target" id="edit_nominal" class="form-control mb-2" placeholder="Nominal">
        <input type="date" name="tanggal_dimulai" id="edit_mulai" class="form-control mb-2">
        <input type="date" name="tanggal_berakhir" id="edit_akhir" class="form-control mb-2" placeholder="tanggal berakhir ....">
        <select name="metode_menabung" id="edit_metode" class="form-control mb-2">
          <option value="harian">Harian</option>
          <option value="mingguan">Mingguan</option>
          <option value="bulanan">Bulanan</option>
        </select>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      </form>
    </div>
  </div>
</div>




</div>
</div>


</div>
</div>




<div class="modal fade" id="modalDetail" tabindex="-1">
  <div class="modal-dialog">
    <form id="formEdit">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detail/Edit Tabungan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="edit_id">
          <input type="text" name="nama_target" id="edit_nama_target" class="form-control mb-2" placeholder="Nama Target" required>
          <input type="number" name="nominal_target" id="edit_nominal_target" class="form-control mb-2" placeholder="Nominal Target" required>
          <input type="date" name="tanggal_dimulai" id="edit_tanggal_dimulai" class="form-control mb-2" required>
          <input type="date" name="tanggal_berakhir" id="edit_tanggal_berakhir" class="form-control mb-2" required>
          <select name="metode_menabung" id="edit_metode_menabung" class="form-control mb-2" required>
            <option value="">Pilih Metode</option>
            <option value="harian">Harian</option>
            <option value="mingguan">Mingguan</option>
            <option value="bulanan">Bulanan</option>
          </select>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
    </form>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.getElementById('saveButton').addEventListener('click', function(event) {
    event.preventDefault();
    const form = document.getElementById('formTambah');
    const formData = new FormData(form);

    fetch('tabungan-target-save', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.success);
            location.reload();
        } else {
            alert(data.error || 'Terjadi kesalahan saat menyimpan data.');
        }
    })
    .catch(error => console.error('Error:', error));
});

// document.querySelectorAll('.modalDetail').forEach(button => {
//     button.addEventListener('click', function() {
//         const id = this.getAttribute('data-id');
        
//         fetch(tabungan-target-detail?id=${id})
//             .then(response => response.json())
//             .then(data => {
//                 document.getElementById('detailNama').textContent = data.nama_target;
//                 document.getElementById('detailDeskripsi').textContent = data.nominal_target;
//                 document.getElementById('detailTanggalDimulai').textContent = data.tanggal_dimulai;
//                 document.getElementById('detailTanggalBerakhir').textContent = data.tanggal_berakhir;
//                 document.getElementById('detailMetode').textContent = data.metode_menabung;
//                 document.getElementById('detailTargetTercapai').textContent = data.target_tercapai ? 'Ya' : 'Tidak';
//                 document.getElementById('detailHasilKalkulasi').textContent = data.hasil_kalkulasi;
//                 document.getElementById('detailPersentase').textContent = data.persentase + '%';
//                 document.getElementById('detailCreatedAt').textContent = data.created_at;

//                 $('#modalDetail').modal('show');
//             })
//             .catch(error => console.error('Error:', error));

//             });
//     });

</script>


</script>
</body>
</html>
