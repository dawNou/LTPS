

<?php $__env->startSection('title', 'Daftar Konten Blog'); ?>

<?php $__env->startSection('container'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Daftar Konten Blog</h1>
</div>

<a href="<?php echo e(url('pemilik-download-post-pdf')); ?>" target="_blank">
  <button class="btn btn-success">
    Export PDF
  </button>
</a>

<div class="table-responsive col-lg-9">
  <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userId => $userPosts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <h3>Konten Blog oleh: <?php echo e($userPosts->first()->author->name); ?></h3>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">NO.</th>
        <th scope="col">Judul</th>
        <th scope="col">Excerpt</th>
        
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $userPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($loop->iteration); ?></td>
        <td><?php echo e($post->title); ?></td>
        <td><?php echo e($post->excerpt); ?></td>
        
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
  <hr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\8. SEMESTER 8\BISMILLAH REVISI PROGRAM\RevProgM7\ltpsm1\resources\views/pemilik/konten.blade.php ENDPATH**/ ?>