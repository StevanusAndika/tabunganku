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
                <h4>Selamat Datang di  <?= APP_NAME ?></h4>
                <h6 class="fw-light">Login untuk menggunakan fitur</h6>
                
                <form class="pt-3" method="POST" action="<?= BASE_URL ?>/login-post" id="loginForm">
                  <div class="form-group">
                    <input type="text" name="login" class="form-control form-control-lg" placeholder="Masukkan Username Atau Email Anda..." required>
                  </div>
                  <div class="form-group position-relative">
                  <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Masukkan Password Anda..." required>
                  <i class="mdi mdi-eye-off position-absolute" id="togglePassword" style="top: 15px; right: 15px; cursor: pointer;"></i>
                </div>
                  <div class="mt-3 d-grid gap-2">
                    <button type="submit" class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn">Login</button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                <span class="text-muted">Lupa Password?</span>
                <a href="<?= BASE_URL ?>/reset-password" class="auth-link text-black">Reset Disini</a>
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
    
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
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

        document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("loginForm");

    form.addEventListener("submit", function (e) {
      const login = form.querySelector('input[name="login"]').value.trim();
    
      const password = form.querySelector('input[name="password"]').value.trim();

      if (!login | !password) {
        e.preventDefault(); // cegah submit form
        Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: 'Semua field wajib diisi!',
          confirmButtonColor: '#d33'
        });
        return;
      }

      // Validasi email format
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailPattern.test(email)) {
        e.preventDefault();
        Swal.fire({
          icon: 'error',
          title: 'Email tidak valid',
          text: 'Silakan masukkan email yang benar!',
          confirmButtonColor: '#d33'
        });
        return;
      }

      // Validasi panjang password
      if (password.length < 8) {
        e.preventDefault();
        Swal.fire({
          icon: 'error',
          title: 'Password terlalu pendek',
          text: 'Password minimal 8 karakter!',
          confirmButtonColor: '#d33'
        });
        return;
      }

      // Jika semua validasi lolos → biarkan form submit
    });
  });


      </script>

        <?php if (has_flash('success')): ?>
      <script>
        
        Swal.fire({
          icon: 'success',
          title: 'Sukses',
          text: '<?= get_flash('success') ?>',
          confirmButtonColor: '#3085d6',
        });
      </script>
    <?php endif; ?>

    <?php if (has_flash('error')): ?>
      <script>
        Swal.fire({
          icon: 'error',
          title: 'Oops!',
          text: '<?= get_flash('error') ?>',
          confirmButtonColor: '#d33',
        });
      </script>
    <?php endif; ?>

  </body>
</html>
