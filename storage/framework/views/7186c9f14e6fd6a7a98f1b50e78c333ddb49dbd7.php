

<?php $__env->startSection('title', 'Buat Kategori Blog'); ?>

<?php $__env->startSection('container'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">
    Buat Kategori Blog Baru
  </h1>
</div>


<div class="col-lg-8">
  <form method="post" action="/dashboard/categories">
    <?php echo csrf_field(); ?>

    
    <div class="mb-3">
      <label for="name" class="form-label" style="font-weight: bold">
        Nama Kategori Blog
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
        autofocus value="<?php echo e(old('name')); ?>">
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
      <label class="form-label" style="font-weight: bold">Cek Kata Kunci yang Cocok</label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>
      <div id="matched-keywords" class="row"></div>
    </div>

    <button type="button" class="btn btn-secondary" id="check-keywords">
      Cek Kata Kunci
    </button>

    <button type="submit" class="btn btn-primary">Buat Kategori Baru</button>
  </form>
  <div id="keyword-results" class="mt-3"></div>
</div>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.querySelector('#name');
    const slug = document.querySelector('#slug');
    const checkKeywordsBtn = document.querySelector('#check-keywords');
    const keywordResults = document.querySelector('#keyword-results');

    // Fetch slug ketika nama kategori berubah
    nameInput.addEventListener('change', function() {
      fetch(`/dashboard/categories/checkSlug?name=${encodeURIComponent(nameInput.value)}`)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
        .catch(error => console.error('Error:', error));
    });

    // Fetch kata kunci ketika tombol cek diklik
    checkKeywordsBtn.addEventListener('click', function() {
      const nameValue = encodeURIComponent(nameInput.value);

      fetch(`/dashboard/categories/checkKeywords?name=${nameValue}`)
        .then(response => response.json())
        .then(data => {
          keywordResults.innerHTML = '';
          if (data.matchedKeywords.length > 0) {
            let resultsHtml = `
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Kata Kunci</th>
                    <th>Frekuensi</th>
                  </tr>
                </thead>
                <tbody>
            `;
            data.matchedKeywords.forEach(keyword => {
              resultsHtml += `
                <tr>
                  <td>${keyword.keyword}</td>
                  <td>${keyword.frequency}</td>
                </tr>
              `;
            });
            resultsHtml += `
                </tbody>
              </table>
            `;
            keywordResults.innerHTML = resultsHtml;
          } else {
            keywordResults.innerHTML = '<strong>Tidak ada kata kunci yang cocok.</strong>';
          }
        })
        .catch(error => {
          console.error('Error:', error);
          keywordResults.innerHTML = '<strong>Terjadi kesalahan saat memproses kata kunci.</strong>';
        });
    });
  });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\8. SEMESTER 8\BISMILLAH REVISI PROGRAM\RevProgM7\ltpsm1\resources\views/dashboard/categories/create.blade.php ENDPATH**/ ?>