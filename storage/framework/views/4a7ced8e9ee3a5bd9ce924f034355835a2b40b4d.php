

<?php $__env->startSection('title', 'Ubah Data Pertanyaan'); ?>

<?php $__env->startSection('container'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">
    Ubah Data Pertanyaan
  </h1>
</div>


<div class="col-lg-8">
  
  
  <form method="post" action="/dashboard/pertanyaans/<?php echo e($pertanyaan->slug); ?>" class="mb-5">

    <?php echo method_field('put'); ?>

    
    <?php echo csrf_field(); ?>

    
    <div class="mb-3">
      <label for="soal" class="form-label" style="font-weight: bold">
        Pertanyaan Baru
      </label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>
      <input type="text" class="form-control <?php $__errorArgs = ['soal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="soal" name="soal" required
        autofocus value="<?php echo e(old('soal', $pertanyaan->soal)); ?>">
      
      <?php $__errorArgs = ['soal'];
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
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>
      <input type="text" class="form-control <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="slug" name="slug" required
        value="<?php echo e(old('slug', $pertanyaan->slug)); ?>">
      
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

    
    <div class="mb-3">
      <label for="katprod_id" class="form-label" style="font-weight: bold">
        Kategori Produk
      </label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>
      <select class="form-select" name="katprod_id">
        <?php $__currentLoopData = $katprods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $katprod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($katprod->katprod_id); ?>" <?php echo e(old('katprod_id', $pertanyaan->katprod_id) == $katprod->katprod_id ?
          'selected' : ''); ?>>
          <?php echo e($katprod->namakatprod); ?>

        </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Perbarui Data Pertanyaan</button>
  </form>
</div>


<script>
  const soal = document.querySelector('#soal');
  const slug = document.querySelector('#slug');

  // nge-fetch data dari method yang akan dibuat di controller AdminPertanyaanController
  soal.addEventListener('change', function() {
    fetch('/dashboard/pertanyaans/checkSlug?soal=' + soal.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\8. SEMESTER 8\BISMILLAH REVISI PROGRAM\RevProgM7\ltpsm1\resources\views/dashboard/pertanyaans/edit.blade.php ENDPATH**/ ?>