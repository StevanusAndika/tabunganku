<?php
// Pastikan session sudah dimulai


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
    <title><?= APP_NAME ?> | Dashboard</title>
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
.card {
    cursor: pointer;
    border: 1px solid #ddd;
    border-radius: 10px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card:hover {
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.card-body {
    padding: 20px;
}

.card-title {
    font-size: 1.25rem;
    font-weight: bold;
}

.card-text {
    font-size: 1rem;
    color: #777;
}

.card i {
    color: #4CAF50; /* Bisa sesuaikan warna */
    margin-bottom: 10px;
}

/* Styling untuk card-container row */
.content-wrapper .row {
    margin-left: -15px;
    margin-right: -15px;
}

/* Kartu dalam satu baris (desktop) */
.col-md-3 {
    padding-left: 15px;
    padding-right: 15px;
    margin-bottom: 30px;
}

/* Tablet - Small Screen (768px - 991px) */
@media (max-width: 991px) {
    .col-md-3 {
        /* Mengubah ukuran kartu agar lebih besar pada tablet */
        flex: 0 0 50%;
        max-width: 50%;
    }
}

/* Mobile - Very Small Screens (max-width: 767px) */
@media (max-width: 767px) {
    .col-md-3 {
        /* Mengubah ukuran kartu agar lebih besar pada mobile */
        flex: 0 0 100%;
        max-width: 100%;
    }

    .card-title {
        font-size: 1.1rem;
    }

    .card-text {
        font-size: 0.9rem;
    }

    .card i {
        font-size: 2rem;
    }
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
        </nav>
        <div class="main-panel">
    <div class="content-wrapper">
    <div class="page-header">
      
    <h2 class="page-title">Halo  <span class="text-black fw-bold"><?php echo htmlspecialchars($user['username']) . "!"; ?></span></h2><br>


        </div>
        <div class="row">
            <!-- Kartu Kategori -->
            <div class="col-md-3">
                <div class="card" onclick="window.location.href='<?= base_url('kategori') ?>'">
                    <div class="card-body text-center">
                        <i class="bi bi-list-ul" style="font-size: 2rem;"></i>
                        <h5 class="card-title mt-3">Kategori</h5>
                        <p class="card-text">Kelola kategori tabungan Anda.</p>
                    </div>
                </div>
            </div>

            <!-- Kartu Riwayat Tabungan -->
            <div class="col-md-3">
                <div class="card" onclick="window.location.href='<?= base_url('riwayat') ?>'">
                    <div class="card-body text-center">
                        <i class="bi bi-clock-history" style="font-size: 2rem;"></i>
                        <h5 class="card-title mt-3">Riwayat Tabungan</h5>
                        <p class="card-text">Lihat riwayat tabungan Anda.</p>
                    </div>
                </div>
            </div>

            <!-- Kartu Tabungan -->
            <div class="col-md-3">
                <div class="card" onclick="window.location.href='<?= base_url('tabungan-target') ?>'">
                    <div class="card-body text-center">
                        <i class="bi bi-cash-coin" style="font-size: 2rem;"></i>
                        <h5 class="card-title mt-3">Kalkulator</h5>
                        <p class="card-text">Kalkulasi Target tabungan.</p>
                    </div>
                </div>
            </div>

            <!-- Kartu Profil -->
            <div class="col-md-3">
                <div class="card" onclick="window.location.href='<?= base_url('profile') ?>'">
                    <div class="card-body text-center">
                        <i class="bi bi-person" style="font-size: 2rem;"></i>
                        <h5 class="card-title mt-3">Profil</h5>
                        <p class="card-text">Lihat dan edit profil Anda.</p>
                    </div>
                </div>
            </div>

          
        </div>
    </div>



          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
              <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Copyright © 2023. All rights reserved.</span>
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
<!-- End custom js for this page-->
<script>
   document.getElementById('signout-btn').addEventListener('click', function(e) {
        e.preventDefault();  // Menghindari pengalihan ke halaman logout langsung

        Swal.fire({
            icon: 'warning',
            title: 'Anda Yakin?',
            text: 'Apakah Anda yakin ingin keluar?',
            showCancelButton: true,
            confirmButtonText: 'Ya, Keluar!',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'logout';  // Arahkan ke URL logout jika pengguna memilih "Ya, Keluar!"
            }
        });
    });

    document.getElementById('dashboard-btn').addEventListener('click', function(e) {
    e.preventDefault();  // Menghindari pengalihan ke halaman logout langsung

    Swal.fire({
        icon: 'warning',
        title: 'Anda Yakin?',
        text: 'Apakah Anda yakin ingin keluar?',
        showCancelButton: true,
        confirmButtonText: 'Ya, Keluar!',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '<?= base_url('logout') ?>';  // Gunakan base_url untuk arahkan ke URL logout
        }else {
          window.location.href = '<?= base_url('dashboard') ?>';  // Arahkan ke URL dashboard jika pengguna memilih "Batal"
            // Jika pengguna memilih "Batal", tidak ada tindakan lebih lanjut yang diperlukan
        }
    });
});

    </script>

    <?php if (has_flash('success')): ?>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Selamat Datang!',
      text: '<?= get_flash('success') ?>',
      confirmButtonColor: '#3085d6',
    });
  </script>
<?php endif; ?>

  </body>
</html>