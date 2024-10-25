

<?php $__env->startSection('title', 'Ubah Data Post'); ?>

<?php $__env->startSection('container'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">
    Ubah Data Post
  </h1>
</div>

<div class="col-lg-8">
  
  <form method="post" action="/dashboard/posts/<?php echo e($post->slug); ?>" class="mb-5" enctype="multipart/form-data">
    <?php echo method_field('put'); ?>
    <?php echo csrf_field(); ?>

    
    <div class="mb-3">
      <label for="title" class="form-label" style="font-weight: bold">
        Judul Baru
      </label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>
      <input type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="title" name="title" required autofocus value="<?php echo e(old('title', $post->title)); ?>">
      <?php $__errorArgs = ['title'];
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
unset($__errorArgs, $__bag); ?>" id="slug" name="slug" required value="<?php echo e(old('slug', $post->slug)); ?>">
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
      <label for="category" class="form-label" style="font-weight: bold">
        Kategori Baru
      </label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>
      <select class="form-select" name="category_id">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if(old('category_id', $post->category_id) == $category->category_id): ?>
            <option value="<?php echo e($category->category_id); ?>" selected><?php echo e($category->name); ?>

            </option>
          <?php else: ?>
          <option value="<?php echo e($category->category_id); ?>"><?php echo e($category->name); ?>

          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
    </div>

    
    <div class="mb-3">
      <label for="image" class="form-label" style="font-weight: bold">
        Gambar Baru
      </label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>

      <input type="hidden" name="oldImage" value="<?php echo e($post->image); ?>">

      
      <?php if($post->image): ?>
        <img src="<?php echo e(asset('storage/' . $post->image)); ?>" class="img-preview img-fluid mb-3 col-sm-5 d-block">
      <?php else: ?>
          <img class="img-preview img-fluid mb-3 col-sm-5">
      <?php endif; ?>

      <input class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="file" id="image" name="image" onchange="previewImage()">

      <?php $__errorArgs = ['image'];
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
      <label for="body" class="form-label" style="font-weight: bold">
        Isi Konten Baru
      </label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>
      <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <p class="text-danger">
        <?php echo e($message); ?>

      </p>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      <input id="body" type="hidden" name="body" value="<?php echo e(old('body', $post->body)); ?>">
      <trix-editor input="body"></trix-editor>
    </div>

    
    <button type="submit" class="btn btn-primary">Ubah Data Post</button>
  </form>
</div>

<script>
  const title = document.querySelector('#title');
  const slug = document.querySelector('#slug');

  title.addEventListener('change', function() {
    fetch('/dashboard/posts/checkSlug?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });

  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  })

  // buat preview image sebelum upload
  function previewImage () {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector
    ('.img-preview')

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\8. SEMESTER 8\BISMILLAH REVISI PROGRAM\RevProgM7\ltpsm1\resources\views/dashboard/posts/edit.blade.php ENDPATH**/ ?>