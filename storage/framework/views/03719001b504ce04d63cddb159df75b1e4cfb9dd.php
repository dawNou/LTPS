

<?php $__env->startSection('title', 'Ubah Data Kategori Produk'); ?>

<?php $__env->startSection('container'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">
    Ubah Data Kategori Produk
  </h1>
</div>


<div class="col-lg-8">
  
  
  <form method="post" action="/dashboard/katprods/<?php echo e($katprod->slug); ?>" class="mb-5">

    <?php echo method_field('put'); ?>

    
    <?php echo csrf_field(); ?>

    
    <div class="mb-3">
      <label for="namakatprod" class="form-label" style="font-weight: bold">
        Nama Kategori Produk Baru
      </label>
      <small style="font-weight:bold; color: red">
        <sup>
          *wajib diisi
        </sup>
      </small>
      <input type="text" class="form-control <?php $__errorArgs = ['namakatprod'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="namakatprod"
        name="namakatprod" required autofocus value="<?php echo e(old('namakatprod', $katprod->namakatprod)); ?>">
      
      <?php $__errorArgs = ['namakatprod'];
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

    
    <div class="mb-3">
      <label for="slug" class="form-label" style="font-weight: bold">
        Slug Baru
      </label>
      <small style="font-weight:bold; color: red">
        <sup>
          *wajib diisi
        </sup>
      </small>
      <input type="text" class="form-control <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="slug" name="slug" required
        value="<?php echo e(old('slug', $katprod->slug)); ?>">
      
      <?php $__errorArgs = ['slug'];
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

    <button type="submit" class="btn btn-primary">
      Perbarui Data Kategori Produk
    </button>

  </form>
</div>


<script>
  const namakatprod = document.querySelector('#namakatprod');
  const slug = document.querySelector('#slug');

  // nge-fetch data dari method yang akan dibuat di controller AdminKatprodController
  namakatprod.addEventListener('change', function() {
    fetch('/dashboard/katprods/checkSlug?namakatprod=' + namakatprod.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
      .catch(error => console.error('Error:', error));
  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\8. SEMESTER 8\BISMILLAH REVISI PROGRAM\RevProgM7\ltpsm1\resources\views/dashboard/katprods/edit.blade.php ENDPATH**/ ?>