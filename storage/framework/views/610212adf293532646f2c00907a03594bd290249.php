

<?php $__env->startSection('title', 'Buat Umpan Balik'); ?>

<?php $__env->startSection('container'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">
    Buat Umpan Balik
  </h1>
</div>


<div class="col-lg-8">
  
  

  
  <form method="post" action="<?php echo e(route('feedbacks.store')); ?>">

    
    <?php echo csrf_field(); ?>

    <div class="form-group mb-3">
      <label for="produk_id">
        <h3>Produk:</h3>
      </label>
      <select name="produk_id" id="produk_id" class="form-control" style="width: 300px;" required>
        <option value="">
          Pilih Produk
        </option>
        <?php $__currentLoopData = $produks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($produk->produk_id); ?>">
          <?php echo e($produk->nama_produk); ?>

        </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
    </div>

    <div id="pertanyaans-container" class="form-group mb-3" style="display:none;">
      <h3>Pertanyaan:</h3>
      <div id="pertanyaans"></div>
    </div>

    <button type="submit" class="btn btn-primary mt-3 mb-3" id="submit-button" style="display:none;">
      Buat Umpan Balik
    </button>
  </form>
</div>

<script>
  document.getElementById('produk_id').addEventListener('change', function() {
      var produkId = this.value;
      var pertanyaansContainer = document.getElementById('pertanyaans-container');
      var pertanyaansDiv = document.getElementById('pertanyaans');
      pertanyaansDiv.innerHTML = '';
      pertanyaansContainer.style.display = 'none';
      document.getElementById('submit-button').style.display = 'none';

      if (produkId) {
          fetch(`/get-pertanyaans-by-produk/${produkId}`)
              .then(response => response.json())
              .then(data => {
                  if (data.pertanyaans && data.pertanyaans.length > 0) {
                      data.pertanyaans.forEach(pertanyaan => {
                          var div = document.createElement('div');
                          div.className = 'form-group';
                          div.innerHTML = `
                              <label for="pertanyaan_${pertanyaan.pertanyaan_id}">${pertanyaan.soal}</label>
                              
                              <textarea name="jawabans[${pertanyaan.pertanyaan_id}]" id="pertanyaan_${pertanyaan.pertanyaan_id}" class="form-control mb-4" required></textarea>
                          `;
                          pertanyaansDiv.appendChild(div);
                      });
                      pertanyaansContainer.style.display = 'block';
                      document.getElementById('submit-button').style.display = 'block';
                  }
              });
      }
  });

  // Prevent multiple form submissions
  document.querySelector('form').addEventListener('submit', function(event) {
      var submitButton = document.getElementById('submit-button');
      submitButton.disabled = true;
  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\8. SEMESTER 8\BISMILLAH REVISI PROGRAM\RevProgM7\ltpsm1\resources\views/dashboard/feedbacks/create.blade.php ENDPATH**/ ?>