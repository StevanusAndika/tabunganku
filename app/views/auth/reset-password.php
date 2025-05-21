<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= APP_NAME ?> | Login</title>

    <!-- CSS Vendor -->
    <link rel="stylesheet" href="<?= asset('assets/vendors/feather/feather.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/vendors/mdi/css/materialdesignicons.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/vendors/ti-icons/css/themify-icons.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/vendors/font-awesome/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/vendors/typicons/typicons.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/vendors/simple-line-icons/css/simple-line-icons.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/vendors/css/vendor.bundle.base.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/css/style.css') ?>">
    <link rel="shortcut icon" href="<?= asset('assets/images/favicon.png') ?>" />
    
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo text-center mb-3">
                  <img src="<?= asset('assets/images/logo.svg') ?>" alt="logo">
                </div>
                <h4>Selamat Datang di Aplikasi <?= APP_NAME ?></h4>
                <h6 class="fw-light">Silahkan Reset Password Anda</h6>
                
                <form id="resetPasswordForm" class="pt-3" method="POST" action="<?= BASE_URL ?>/reset-password-post">

                  <div class="form-group">
                    <input type="text" name="login" class="form-control form-control-lg" placeholder="Masukkan Email Aktif Anda..." required>
                  </div>
                  <div class="form-group position-relative">
                  <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Masukkan Password Baru Anda...." required>
                  <i class="mdi mdi-eye-off position-absolute" id="togglePassword" style="top: 15px; right: 15px; cursor: pointer;"></i>
                </div>
                  <div class="mt-3 d-grid gap-2">
                    <button type="submit" class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn">SIGN IN</button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                <span class="text-muted">Sudah ingat password?</span>
                <a href="<?= BASE_URL ?>/login" class="auth-link text-black">Login di sini</a>
                </div>

                  <div class="text-center mt-4 fw-light">
                    Belum punya akun? <a href="<?= BASE_URL ?>/register" class="text-primary">Daftar Sekarang</a>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

    <!-- JS -->
    <script src="<?= BASE_URL ?>/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="<?= BASE_URL ?>/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="<?= BASE_URL ?>/assets/js/off-canvas.js"></script>
    <script src="<?= BASE_URL ?>/assets/js/template.js"></script>
    <script src="<?= BASE_URL ?>/assets/js/settings.js"></script>
    <script src="<?= BASE_URL ?>/assets/js/hoverable-collapse.js"></script>
    <script src="<?= BASE_URL ?>/assets/js/todolist.js"></script>
    
    <!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  // Toggle password visibility
  const togglePassword = document.getElementById("togglePassword");
  const password = document.getElementById("password");

  togglePassword.addEventListener("click", function () {
    const type = password.type === "password" ? "text" : "password";
    password.type = type;
    this.classList.toggle("mdi-eye");
    this.classList.toggle("mdi-eye-off");
  });

  // Konfirmasi sebelum reset password
  const form = document.getElementById("resetPasswordForm");
  form.addEventListener("submit", function(e) {
    e.preventDefault(); // Cegah submit langsung

    const email = form.querySelector('input[name="login"]').value.trim();
    const newPassword = form.querySelector('input[name="password"]').value.trim();

    // Validasi input kosong
    if (email === "" || newPassword === "") {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Email dan Password baru tidak boleh kosong!',
        confirmButtonColor: '#d33'
      });
      return;
    }

    Swal.fire({
      title: 'Reset Password?',
      text: "Apakah Anda yakin ingin mereset password?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Reset!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        form.submit(); // Submit form jika user konfirmasi
      }
    });
  });

  <?php if (has_flash('success')): ?>
    Swal.fire({
      icon: 'success',
      title: 'Berhasil',
      text: '<?= get_flash('success') ?>',
      confirmButtonColor: '#3085d6',
    });
  <?php endif; ?>

  <?php if (has_flash('error')): ?>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: '<?= get_flash('error') ?>',
      confirmButtonColor: '#d33',
    });
  <?php endif; ?>
</script>

   
   
  </body>
</html>