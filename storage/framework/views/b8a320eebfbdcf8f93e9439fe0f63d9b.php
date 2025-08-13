<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <title>Register - ION Management</title>

    <meta name="description" content="User registration page" />
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;600;700&display=swap" rel="stylesheet" />
    
    <!-- Styles -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="../assets/vendor/css/core.css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />

    <!-- Scripts -->
    <script src="../assets/vendor/js/helpers.js"></script>
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">

          <!-- Register Card -->
          <div class="card">
            <div class="card-body">

              <!-- Branding -->
              <div class="app-brand justify-content-center">
                <a href="/register" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo"><!-- Logo here if any --></span>
                  <span class="app-brand-text demo text-body fw-bolder">ION</span>
                </a>
              </div>

              <h4 class="mb-2">Adventure starts here 🚀</h4>
              <p class="mb-4">Make your management easy</p>

              <!-- Registration Form -->
              <form method="POST" action="<?php echo e(route('register')); ?>">
                <?php echo csrf_field(); ?>

                <!-- Name -->
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name')); ?>" required autofocus placeholder="Enter your name" />
                  <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Telepon -->
                <div class="mb-3">
                  <label for="telepon" class="form-label">Telepon</label>
                  <input type="text" class="form-control" id="telepon" name="telepon" value="<?php echo e(old('telepon')); ?>" placeholder="08123456789" />
                  <?php $__errorArgs = ['telepon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

              <!-- Alamat -->
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <small class="text-muted d-block mb-1">
                  Harap masukkan alamat lengkap dan detail (nama jalan, RT/RW, nomor rumah, patokan) untuk memudahkan pemesanan.
                </small>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Contoh: Jl. Mawar No.12 RT.02 RW.03, dekat masjid Al-Ikhlas"><?php echo e(old('alamat')); ?></textarea>
                <?php $__errorArgs = ['alamat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>


                <!-- Email -->
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>" required placeholder="Enter your email" />
                  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Password -->
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control" name="password" required placeholder="********" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                  <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                  <label for="password_confirmation" class="form-label">Confirm Password</label>
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required placeholder="********" />
                  <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Hidden Role -->
                <input type="hidden" name="role" value="pelanggan">

                <!-- Submit -->
                <button type="submit" class="btn btn-primary d-grid w-100">Sign up</button>
              </form>

              <!-- Redirect to login -->
              <p class="text-center mt-3">
                <span>Already have an account?</span>
                <a href="<?php echo e(route('login')); ?>"><span>Sign in instead</span></a>
              </p>
            </div>
          </div>
          <!-- /Register Card -->

        </div>
      </div>
    </div>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('.form-password-toggle .input-group-text').forEach(function(toggle) {
      toggle.addEventListener('click', function() {
        let input = this.closest('.input-group').querySelector('input');
        let icon = this.querySelector('i');

        if (input.type === 'password') {
          input.type = 'text';
          icon.classList.remove('bx-hide');
          icon.classList.add('bx-show');
        } else {
          input.type = 'password';
          icon.classList.remove('bx-show');
          icon.classList.add('bx-hide');
        }
      });
    });
  });
</script>

    <!-- Scripts -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>
    <script src="../assets/js/main.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
<?php /**PATH /home/u816639003/domains/ionwifi.site/public_html/resources/views/auth/register.blade.php ENDPATH**/ ?>