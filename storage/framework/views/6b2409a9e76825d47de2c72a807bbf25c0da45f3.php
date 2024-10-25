

<?php $__env->startSection('title', 'Ubah Data Kategori Blog'); ?>

<?php $__env->startSection('container'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">
    Ubah Data Kategori
  </h1>
</div>


<div class="col-lg-8">
  
  
  <form method="post" action="/dashboard/categories/<?php echo e($category->slug); ?>" class="mb-5">

    <?php echo method_field('put'); ?>

    
    <?php echo csrf_field(); ?>

    
    <div class="mb-3">
      <label for="name" class="form-label" style="font-weight: bold">
        Nama Kategori Baru
      </label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>
      <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name" name="name" required
        autofocus value="<?php echo e(old('name', $category->name)); ?>">
      
      <?php $__errorArgs = ['name'];
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
      <label for="slug" class="form-label"  style="font-weight: bold">
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
        value="<?php echo e(old('slug', $category->slug)); ?>">
      
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
      <label class="form-label" style="font-weight: bold">
        Pilih Kata Kunci
      
      </label>
      <div class="row">
        <?php $__currentLoopData = $keywords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $keyword): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="keywords[]" id="keyword<?php echo e($keyword->keyword_id); ?>"
              value="<?php echo e($keyword->keyword_id); ?>" <?php if(isset($category) && $category->keywords->contains($keyword->keyword_id)): ?> checked
              <?php endif; ?>>
            <label class="form-check-label" for="keyword<?php echo e($keyword->keyword_id); ?>">
              <?php echo e($keyword->keyword); ?>

            </label>
          </div>
        </div>
        <?php if(($index + 1) % 4 == 0): ?>
      </div>
      <div class="row">
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>

    <button type="submit" class="btn btn-primary">Perbarui Data Kategori Post</button>
  </form>
</div>


<script>
  const name = document.querySelector('#name');
  const slug = document.querySelector('#slug');

  // nge-fetch data dari method yang akan dibuat di controller AdminCategoryController
  name.addEventListener('change', function() {
    fetch('/dashboard/categories/checkSlug?name=' + name.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\8. SEMESTER 8\BISMILLAH REVISI PROGRAM\RevProgM7\ltpsm1\resources\views/dashboard/categories/edit.blade.php ENDPATH**/ ?>