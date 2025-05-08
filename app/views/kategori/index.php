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
      
            <h2 class="page-title">Kategori</h2><br>
           
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
            <th class="sortable" onclick="sortTable(1)"> Nama Kategori <i class="mdi mdi-swap-vertical"></i></th>
            <th class="sortable" onclick="sortTable(2)"> Deskripsi <i class="mdi mdi-swap-vertical"></i></th>
            <th class="sortable" onclick="sortTable(3)"> Aksi<i class="mdi mdi-swap-vertical"></i></th> <!-- Kolom angka -->
            
              </tr>
            </thead>
                    <tbody id="kategoriBody">
        <?php if (empty($kategori)) : ?>
            <tr>
            <td colspan="4" class="text-center">Data kategori belum tersedia.</td>
            </tr>
        <?php else : ?>
            <?php $no = 1; ?>
            <?php foreach ($kategori as $row) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['nama_kategori']) ?></td>
                <td><?= htmlspecialchars($row['deskripsi']) ?></td>
                <td>
                <button class="btn btn-info btn-sm btn-detail" data-id="<?= $row['id'] ?>">Detail</button>
                <button class="btn btn-warning btn-sm btn-edit" data-id="<?= $row['id'] ?>">Edit</button>
                <button class="btn btn-danger btn-sm btn-delete" data-id="<?= $row['id'] ?>">Hapus</button>
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
    </div>
<!-- Modal Tambah Data -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="formTambah" method="POST" action="<?= base_url('kategori-add') ?>">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTambahLabel">Tambah Kategori</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="namaKategori" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" id="namaKategori" name="nama_kategori" required>
          </div>
          <div class="mb-3">
            <label for="deskripsiKategori" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsiKategori" rows="3" name="deskripsi" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
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
        <h5 class="modal-title">Detail Kategori</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p><strong>Nama Kategori:</strong> <span id="detailNama"></span></p>
        <p><strong>Deskripsi:</strong> <span id="detailDeskripsi"></span></p>
        <p><strong>Dibuat Pada:</strong> <span id="detailCreatedAt"></span></p> <!-- Tambahkan ini -->
      </div>
    </div>
  </div>
</div>


<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="formEdit">
        <div class="modal-header">
          <h5 class="modal-title">Edit Kategori</h5>
          <button class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="editId">
          <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" id="editNama" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Deskripsi</label>
            <textarea id="editDeskripsi" class="form-control" rows="3" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
      </form>
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
$(document).ready(function () {
    loadKategori();

    // Tambah Kategori dengan konfirmasi
    $('#formTambah').on('submit', function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Tambah Kategori?',
            text: 'Pastikan data sudah benar.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Tambah',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                const nama = $('#namaKategori').val();
                const deskripsi = $('#deskripsiKategori').val();

                $.post('kategori-add', { nama, deskripsi }, function (result) {
                    if (result.error) {
                        Swal.fire('Error', result.error, 'error');
                    } else {
                        Swal.fire('Sukses', result.success, 'success');
                        $('#formTambah')[0].reset();
                        $('#modalTambah').modal('hide');
                        loadKategori();
                    }
                }).fail(function () {
                    Swal.fire('Error', 'Terjadi kesalahan saat menambahkan kategori.', 'error');
                });
            }
        });
    });



    

    // Edit Kategori dengan konfirmasi
    $('#formEdit').on('submit', function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Perbarui Kategori?',
            text: 'Perubahan akan disimpan.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Perbarui',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                const id = $('#editId').val();
                const nama = $('#editNama').val();
                const deskripsi = $('#editDeskripsi').val();

                $.post('kategori-update', { id, nama, deskripsi }, function (result) {
                    if (result.error) {
                        Swal.fire('Error', result.error, 'error');
                    } else {
                        Swal.fire('Sukses', result.success, 'success');
                        $('#modalEdit').modal('hide');
                        loadKategori();
                    }
                }).fail(function () {
                    Swal.fire('Error', 'Terjadi kesalahan saat memperbarui kategori.', 'error');
                });
            }
        });
    });

    

function loadKategori() {
    $.get('kategori', function (html) {
        const newTable = $('<div>').html(html).find('#kategoriBody').html();
        $('#kategoriBody').html(newTable);
        attachButtonEvents();
    });
}

function attachButtonEvents() {
    $('.btn-detail').off('click').on('click', function () {
        const id = $(this).data('id');
        lihatDetail(id);
    });

    $('.btn-edit').off('click').on('click', function () {
        const id = $(this).data('id');
        editKategori(id);
    });

    $('.btn-delete').off('click').on('click', function () {
        const id = $(this).data('id');
        hapusKategori(id);
    });
}

function lihatDetail(id) {
    $.getJSON(`kategori-detail?id=${id}`, function (data) {
        if (data.error) {
            Swal.fire('Error', data.error, 'error');
        } else {
            $('#detailNama').text(data.nama_kategori);
            $('#detailDeskripsi').text(data.deskripsi);
            $('#detailCreatedAt').text(data.created_at);
            $('#modalDetail').modal('show');
        }
    }).fail(function () {
        Swal.fire('Error', 'Terjadi kesalahan saat memuat detail kategori.', 'error');
    });
}

function editKategori(id) {
    $.getJSON(`kategori-detail?id=${id}`, function (data) {
        if (data.error) {
            Swal.fire('Error', data.error, 'error');
        } else {
            $('#editId').val(data.id);
            $('#editNama').val(data.nama_kategori);
            $('#editDeskripsi').val(data.deskripsi);
            $('#modalEdit').modal('show');
        }
    }).fail(function () {
        Swal.fire('Error', 'Terjadi kesalahan saat memuat data kategori untuk diedit.', 'error');
    });
}

function hapusKategori(id) {
    Swal.fire({
        title: 'Yakin hapus?',
        text: "Data tidak bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post('kategori-delete', { id }, function (result) {
                if (result.error) {
                    Swal.fire('Error', result.error, 'error');
                } else {
                    Swal.fire('Terhapus!', 'Kategori telah dihapus.', 'success');
                    loadKategori();
                }
            }).fail(function () {
                Swal.fire('Error', 'Terjadi kesalahan saat menghapus kategori.', 'error');
            });
        }
    });
}

let sortDirection = [];

function sortTable(columnIndex) {
    const $table = $('#kategoriTable');
    const rows = $table.find('tr').not(':first').get();

    sortDirection[columnIndex] = !sortDirection[columnIndex];

    rows.sort(function (a, b) {
        let cellA = $(a).children('td').eq(columnIndex).text().trim();
        let cellB = $(b).children('td').eq(columnIndex).text().trim();
        let isNumeric = !isNaN(cellA) && !isNaN(cellB);

        if (isNumeric) {
            return sortDirection[columnIndex] ? cellA - cellB : cellB - cellA;
        } else {
            return sortDirection[columnIndex]
                ? cellA.localeCompare(cellB)
                : cellB.localeCompare(cellA);
        }
    });

    $.each(rows, function (index, row) {
        $table.append(row);
    });

    $table.find('th i').each(function (index) {
        if (index === columnIndex) {
            $(this).attr('class', sortDirection[columnIndex] ? 'mdi mdi-swap-vertical' : 'mdi mdi-arrow-down');
        } else {
            $(this).attr('class', 'mdi mdi-swap-vertical');
        }
    });
}



</script>

</body>
</html>
