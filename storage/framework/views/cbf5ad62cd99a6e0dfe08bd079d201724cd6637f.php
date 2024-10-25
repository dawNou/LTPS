

<?php $__env->startSection('title', 'Umpan Balik'); ?>

<?php $__env->startSection('container'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Umpan Balik</h1>
</div>

<a href="<?php echo e(url('admin-download-feedback-pdf')); ?>" target="_blank">
  <button class="btn btn-success">
    Export PDF
  </button>
</a>

<div class="table-responsive col-lg-9">
  <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userId => $userFeedbacks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <h3>Pelanggan: <?php echo e($userFeedbacks->first()->user->name); ?></h3>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">NO.</th>
        <th scope="col">Produk</th>
        <th scope="col">Pertanyaan</th>
        <th scope="col">Jawaban</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $userFeedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($loop->iteration); ?></td>
        <td><?php echo e($feedback->produk->nama_produk ?? 'Tidak ada nama produk'); ?></td>
        <td><?php echo e($feedback->pertanyaan->soal ?? 'Tidak ada soal'); ?></td>
        <td><?php echo e($feedback->jawaban ?? 'Tidak ada jawaban'); ?></td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
  <hr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\JOURNEY RFP\Associate - IFS - Application Development_PwC Indonesia\UPLOAD GitHub\ltpsm1\resources\views/dashboard/admin_feedbacks/index.blade.php ENDPATH**/ ?>