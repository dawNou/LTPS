

<?php $__env->startSection('container'); ?>

<div class="row justify-content-center" style="padding-top: 80px">
  <div class="col-md-4">

    
    <?php if(session()->has('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?php echo e(session('success')); ?>

      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    
    <?php if(session()->has('loginError')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?php echo e(session('loginError')); ?>

      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <main class="form-signin w-100 m-auto">
      <h1 class="h3 mb-3 fw-normal text-center"
        style="padding-top: 80px; font-family: sans-serif; font-weight: bold; font-size: 34px">
        Silahkan Login
      </h1>

      <form action="/login" method="post">

        <?php echo csrf_field(); ?>

        
        <div class="form-floating">
          <input type="email" name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email"
            placeholder="name@example.com" autofocus required value="<?php echo e(old('email')); ?>">
          <label for="email">
            Email address
          </label>
          <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <div class="invalid-feedback">
            <?php echo e($message); ?>

          </div>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        
        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
          <label for="password">
            Password
          </label>
        </div>

        
        <div class="form-group mt-3 mb-3">
          <label for="captcha">
            Captcha
          </label>
          <div class="captcha">
            <span><?php echo captcha_img(); ?></span>
            <button type="button" class="btn btn-success btn-refresh">
              Refresh
            </button>
          </div>
          <input type="text" name="captcha" class="form-control mt-2 <?php $__errorArgs = ['captcha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
            placeholder="Masukkan Kode Captcha" required>
          <?php $__errorArgs = ['captcha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <div class="invalid-feedback">
            <?php echo e($message); ?>

          </div>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <button class="btn w-100 py-2" style="background-color: #800020; color: white; border-color: #8B0000;"
          type="submit">
          Login
        </button>
      </form>

      <small class="d-block text-center mt-3">
        Belum mempunyai akun?
        <a href="/register">
          Registrasi Sekarang!
        </a>
      </small>

      <p class="d-block text-center mt-4 mb-3 text-body-secondary">
        &copy; Lilin Tiga Putra Sejahtera | 2024
      </p>

    </main>
  </div>
</div>

<script type="text/javascript">
  document.querySelector('.btn-refresh').onclick = function() 
  {
    fetch('/refresh-captcha')
      .then(response => response.json())
      .then(data => {
        document.querySelector('.captcha span').innerHTML = data.captcha;
      });
  }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\JOURNEY RFP\Associate - IFS - Application Development_PwC Indonesia\UPLOAD GitHub\ltpsm1\resources\views/login/index.blade.php ENDPATH**/ ?>