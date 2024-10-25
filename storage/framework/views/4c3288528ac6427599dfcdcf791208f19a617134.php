

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('container'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Selamat Datang, <?php echo e(auth()->user()->name); ?></h1>
</div>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>

<div class="row">

  
  <div class="col-md-4">
    <div class="card text-white mb-3" style="background-color: #40534C">
      <div class="card-header">Jumlah Umpan Balik</div>
      <div class="card-body">
        <h5 class="card-title"><?php echo e($feedbackCount); ?></h5>
        <a href="/dashboard/adminfeedbacks" class="btn btn-light">Selengkapnya >></a>
      </div>
    </div>
  </div>

  
  <div class="col-md-4">
    <div class="card text-white mb-3" style="background-color: #A0153E">
      <div class="card-header">Jumlah Kata Kunci</div>
      <div class="card-body">
        <h5 class="card-title"><?php echo e($keywordCount); ?></h5>
        <a href="/dashboard/keywords" class="btn btn-light">Selengkapnya >></a>
      </div>
    </div>
  </div>

  
  <div class="col-md-4">
    <div class="card text-white mb-3" style="background-color: #524C42">
      <div class="card-header">Jumlah Kategori Blog</div>
      <div class="card-body">
        <h5 class="card-title"><?php echo e($katblogCount); ?></h5>
        <a href="/dashboard/categories" class="btn btn-light">Selengkapnya >></a>
      </div>
    </div>
  </div>

  
  <div class="col-md-4">
    <div class="card text-white mb-3" style="background-color: #1F6E8C">
      <div class="card-header">Jumlah Konten Blog</div>
      <div class="card-body">
        <h5 class="card-title"><?php echo e($kontenblogCount); ?></h5>
        <a href="/dashboard/posts" class="btn btn-light">Selengkapnya >></a>
      </div>
    </div>
  </div>

  
  <div class="col-md-4">
    <div class="card text-white mb-3" style="background-color: #D21312">
      <div class="card-header">Jumlah Produk</div>
      <div class="card-body">
        <h5 class="card-title"><?php echo e($produkCount); ?></h5>
        <a href="/dashboard/produks" class="btn btn-light">Selengkapnya >></a>
      </div>
    </div>
  </div>

  
  <div class="col-md-4">
    <div class="card text-white mb-3" style="background-color: #735F32">
      <div class="card-header">Jumlah Kategori Produk</div>
      <div class="card-body">
        <h5 class="card-title"><?php echo e($katprodCount); ?></h5>
        <a href="/dashboard/katprods" class="btn btn-light">Selengkapnya >></a>
      </div>
    </div>
  </div>

  
  <div class="col-md-4">
    <div class="card text-white mb-3" style="background-color: #A27B5C">
      <div class="card-header">Jumlah Pertanyaan</div>
      <div class="card-body">
        <h5 class="card-title"><?php echo e($pertanyaanCount); ?></h5>
        <a href="/dashboard/pertanyaans" class="btn btn-light">Selengkapnya >></a>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\8. SEMESTER 8\BISMILLAH REVISI PROGRAM\RevProgM7\ltpsm1\resources\views/dashboard/index.blade.php ENDPATH**/ ?>