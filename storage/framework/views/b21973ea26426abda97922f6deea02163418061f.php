

<?php $__env->startSection('title', 'Buat Post'); ?>

<?php $__env->startSection('container'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Buat Konten Baru</h1>
</div>

<div class="col-lg-8">
  <form method="post" action="<?php echo e(url('dashboard/posts')); ?>" class="mb-5" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

    
    <div class="mb-3">
      <label for="title" class="form-label" style="font-weight: bold">
        Judul
      </label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>
      <input type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="title" name="title" required
        autofocus value="<?php echo e(old('title')); ?>">
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
        Slug
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
        value="<?php echo e(old('slug')); ?>">

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
      <label for="category_id" class="form-label" style="font-weight: bold">
        Kategori
      </label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>
      <select id="category_id" class="form-select" name="category_id">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($category->category_id); ?>" <?php echo e(old('category_id')==$category->category_id ? 'selected' : ''); ?>>
          <?php echo e($category->name); ?>

        </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
    </div>

    
    <div class="mb-3">
      <label for="image" class="form-label" style="font-weight: bold">
        Gambar Konten
      </label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>

      <img class="img-preview img-fluid mb-3 col-sm-5">

      <input class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="file" id="image" name="image"
        onchange="previewImage()">

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
        Isi Konten
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
      <input id="body" type="hidden" name="body" value="<?php echo e(old('body')); ?>">
      <trix-editor input="body"></trix-editor>
    </div>

    <button type="submit" class="btn btn-primary">Buat Konten Baru</button>
  </form>
</div>

<script>
  const categorySelect = document.querySelector('#category_id');
  const titleInput = document.querySelector('#title');
  const bodyInput = document.querySelector('#body');
  const trixEditor = document.querySelector('trix-editor');

  categorySelect.addEventListener('change', function() {
    const categoryId = this.value;

    if (categoryId) {
      fetch(`/dashboard/categories/${categoryId}/keywords`)
        .then(response => response.json())
        .then(keywords => {
          console.log('Keywords received:', keywords); // Debugging

          // Menggabungkan kata kunci menjadi satu string
          let keywordsText = keywords.map(keyword => keyword.keyword).join(' ');

          // Menampilkan kata kunci di kolom judul
          titleInput.value = keywordsText;

          // Menampilkan kata kunci di kolom body (trix-editor)
          // trixEditor.editor.setSelectedRange([0, 0]);
          // Menghapus konten lama dari trix-editor
        trixEditor.editor.setSelectedRange([0, trixEditor.editor.getDocument().getLength()]);
        trixEditor.editor.deleteInDirection("backward");
          trixEditor.editor.insertString(keywordsText);
        })
        .catch(error => console.error('Error fetching keywords:', error));
    } else {
      titleInput.value = '';
      trixEditor.editor.setSelectedRange([0, 0]);
      trixEditor.editor.insertString('');
    }
  });

  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  })

  // Buat preview image sebelum upload
  function previewImage () {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\8. SEMESTER 8\BISMILLAH REVISI PROGRAM\RevProgM7\ltpsm1\resources\views/dashboard/posts/create.blade.php ENDPATH**/ ?>