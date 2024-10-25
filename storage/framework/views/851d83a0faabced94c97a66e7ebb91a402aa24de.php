

<?php $__env->startSection('title', 'Umpan Balik'); ?>

<?php $__env->startSection('container'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Umpan Balik Saya</h1>
</div>


<?php if(session()->has('success')): ?>
    <div class="alert alert-success col-lg-8" role="alert">
      <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<div class="table-responsive col-lg-9 mb-3">

  
  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('admin')): ?>
  <a href="/dashboard/feedbacks/create" class="btn btn-primary mb-3">
    Buat Umpan Balik Baru
  </a>
  <?php endif; ?>

  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col" style="text-align: center;">NO.</th>
        <th scope="col" style="text-align: center;">Nama</th>
        <th scope="col" style="text-align: center;">Produk</th>
        <th scope="col" style="text-align: center;">Pertanyaan</th>
        <th scope="col" style="text-align: center;">Jawaban</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td style="text-align: center;"><?php echo e($loop->iteration); ?></td>
        <td><?php echo e($feedback->user->name ?? 'Tidak ada nama'); ?></td>
        <td style="text-align: center;"><?php echo e($feedback->produk->nama_produk ?? 'Tidak ada produk'); ?></td>
        <td><?php echo e($feedback->pertanyaan->soal ?? 'Tidak ada pertanyaan'); ?></td>
        <td><?php echo e($feedback->jawaban ?? 'Tidak ada jawaban'); ?></td>
        <td>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\JOURNEY RFP\Associate - IFS - Application Development_PwC Indonesia\UPLOAD GitHub\ltpsm1\resources\views/dashboard/feedbacks/index.blade.php ENDPATH**/ ?>