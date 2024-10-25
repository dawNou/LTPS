

<?php $__env->startSection('container'); ?>

<div class="container" style="padding-top:5%">
  <div class="row justify-content-center mb-5">
    <div class="col-md-8">
      <h1 class="mb-3"><?php echo e($produk->nama_produk); ?></h1>

      <h5>
        Kategori: <?php echo e($produk->katprod->namakatprod); ?>

      </h5>

      <h5>
        Harga: Rp <?php echo e(number_format($produk->harga_produk, 0, ',', '.')); ?>

      </h5>

      <a href="/produks" class="text-decoration-none btn mb-3"
        style="background-color: #800020; color: white; border-color: #8B0000;">
        <<< Kembali Ke Katalog Produk </a>

          <?php if($produk->image): ?>
          <div style="max-height: 350px; overflow:hidden;">
            <img src="<?php echo e(asset('storage/' . $produk->image)); ?>" alt="<?php echo e($produk->katprod->namakatprod); ?>"
              class="img-fluid">
          </div>
          <?php else: ?>
          <img src="" alt="<?php echo e($produk->katprod->namakatprod); ?>" class="img-fluid">
          <?php endif; ?>

          <article class="my-3 fs-5">
            <?php echo $produk->body; ?>

          </article>

          <a href="/produks" class="text-decoration-none btn mb-3"
            style="background-color: #800020; color: white; border-color: #8B0000;">
            <<< Kembali Ke Katalog Produk </a>

    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\JOURNEY RFP\Associate - IFS - Application Development_PwC Indonesia\LTPS\ltpsm1\resources\views/produk.blade.php ENDPATH**/ ?>