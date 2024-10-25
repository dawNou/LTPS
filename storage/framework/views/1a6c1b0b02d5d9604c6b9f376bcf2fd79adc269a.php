

<?php $__env->startSection('title', 'Umpan Balik'); ?>

<?php $__env->startSection('container'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Umpan Balik Pelanggan</h1>
</div>

<a href="<?php echo e(url('pemilik-download-feedback-pdf')); ?>" target="_blank">
  <button class="btn btn-success">
    Export PDF
  </button>
</a>

<div class="table-responsive col-lg-9">
  <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userId => $userFeedbacks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <h3>Umpan Balik dari: <?php echo e($userFeedbacks->first()->user->name); ?></h3>
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
        <td><?php echo e($feedback->produk->nama_produk); ?></td>
        <td><?php echo e($feedback->pertanyaan->soal); ?></td>
        <td><?php echo e($feedback->jawaban); ?></td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
  <hr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\8. SEMESTER 8\BISMILLAH REVISI PROGRAM\RevProgM7\ltpsm1\resources\views/pemilik/feedback.blade.php ENDPATH**/ ?>