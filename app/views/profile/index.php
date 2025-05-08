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
    <title><?= APP_NAME ?> | Profile </title>
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
    <!-- <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding px-3 d-flex align-items-center justify-content-between">
            <div class="ps-lg-3">
              
            </div> -->
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
              <img src ="<?= asset('assets/images/logo-mini.svg') ?>" alt="logo" />
          
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
                <a class="dropdown-item "><i class="dropdown-item-icon active mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
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
       
        <!-- partial -->
        <div class="main-panel">
    <div class="content-wrapper">
        <h4 class="page-title">Profile</h4>

        <div class="card">
<div class="card-body d-flex align-items-center"">
    <img src="<?= isset($profile['path_photo']) && file_exists($profile['path_photo']) ? $profile['path_photo'] : 'public/assets/default.jpg'; ?>" 
         alt="foto" width="100" height="100" class="rounded-circle me-4" style="object-fit: cover;">

    <div>
        <p><strong>Nama User:</strong> <?= $profile['username'] ?? '<em>Silakan update datamu terlebih dahulu</em>'; ?></p>
        <p><strong>Email:</strong> <?= $profile['email'] ?? '<em>Silakan update datamu terlebih dahulu</em>'; ?></p>
        <p><strong>Alamat:</strong> <?= $profile['alamat'] ?? '<em>Silakan update datamu terlebih dahulu</em>'; ?></p>
        <p><strong>No Telpon:</strong> <?= $profile['no_telpon'] ?? '<em>Silakan update datamu terlebih dahulu</em>'; ?></p>
        <p><strong>Status:</strong> <?= $profile['biodata_status'] ?? '<em>Silakan update datamu terlebih dahulu</em>'; ?></p>
        <p><strong>Terakhir Diupdate:</strong> <?= $profile['updated_at'] ?? '-'; ?></p>

        <button class="btn btn-info btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#modalDetail">Detail</button>
        <button class="btn btn-warning btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#modalEdit">Edit</button>
    </div>
</div>
</div>

    </div>
</div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="modalDetail" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Profil</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
               
                <p><strong>Username:</strong> <?= $profile['username'] ?? '-'; ?></p>
                <p><strong>Email:</strong> <?= $profile['email'] ?? '-'; ?></p>
                <p><strong>Alamat:</strong> <?= $profile['alamat'] ?? '-'; ?></p>
                <p><strong>No Telpon:</strong> <?= $profile['no_telpon'] ?? '-'; ?></p>
                <p><strong>Status:</strong> <?= $profile['biodata_status'] ?? '-'; ?></p>
                <p><strong>Diupdate pada:</strong> <?= $profile['updated_at'] ?? '-'; ?></p>
            </div>
        </div>
    </div>
</div>


<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formEdit" action="<?= base_url('profile-update') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Profil</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="<?= $profile['username'] ?? ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?= $profile['email'] ?? ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>No Telpon</label>
                        <input type="text" name="no_telpon" class="form-control" value="<?= $profile['no_telpon'] ?? ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control"><?= $profile['alamat'] ?? ''; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Password (kosongkan jika tidak diubah)</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Foto Profil (opsional)</label>
                        <input type="file" name="photo" class="form-control" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function () {
    // Submit form edit profil
    $('#formEdit').on('submit', function (e) {
        e.preventDefault();

        Swal.fire({
            title: 'Perbarui Profil?',
            text: 'Data akan diperbarui. Lanjutkan?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, Simpan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                let formData = new FormData(this);

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (res) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Profil berhasil diperbarui.',
                        }).then(() => {
                            location.reload();
                        });
                    },
                    error: function (xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Terjadi kesalahan saat menyimpan data.',
                        });
                    }
                });
            }
        });
    });

    // Logout konfirmasi
    $('#signout-btn').on('click', function (e) {
        e.preventDefault();
        Swal.fire({
            icon: 'warning',
            title: 'Anda yakin ingin keluar?',
            text: 'Sesi Anda akan diakhiri.',
            showCancelButton: true,
            confirmButtonText: 'Ya, keluar',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'logout';
            }
        });
    });
});
</script>

</body>
</html>
