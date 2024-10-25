

<?php $__env->startSection('title', 'Konten Blog'); ?>

<?php $__env->startSection('container'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Konten Blog</h1>
</div>


<?php if(session()->has('success')): ?>
    <div class="alert alert-success col-lg-8" role="alert">
      <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<div class="table-responsive col-lg-9">

  <div class="d-flex justify-content-start mb-3">
    <a href="/dashboard/posts/create" class="btn btn-primary mr-3">
      Buat Konten Blog Baru
    </a>
  
    <a href="<?php echo e(url('admin-download-post-pdf')); ?>" target="_blank">
      <button class="btn btn-success"  style="margin-left: 20px;">
        Export PDF
      </button>
    </a>
  </div>
  
  
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col" style="width: 5%; text-align: center;">NO.</th>
        <th scope="col" style="text-align: center;">Judul</th>
        <th scope="col" style="text-align: center;">Kategori Blog</th>
        <th scope="col" style="text-align: center;">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td style="text-align: center;"><?php echo e($loop->iteration); ?>.</td>
        <td><?php echo e($post->title); ?></td>
        <td style="text-align: center;"><?php echo e($post->category->name ?? 'Tidak ada kategori'); ?></td>
        <td style="text-align: center;">

          
          <a href="/dashboard/posts/<?php echo e($post->slug); ?>" class="badge bg-info"><i class="bi bi-eye"></i>
          </a>

          
          <a href="/dashboard/posts/<?php echo e($post->slug); ?>/edit" class="badge bg-warning">
            <i class="bi bi-pencil-square"></i>
          </a>

          
          <form action="/dashboard/posts/<?php echo e($post->slug); ?>" method="post" class="d-inline">
            <?php echo method_field('delete'); ?>
            <?php echo csrf_field(); ?>
            <button class="badge bg-danger border-0" onclick="return confirm('Apakah anda yakin?')">
              <i class="bi bi-x-circle"></i>
            </button>
          </form>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\JOURNEY RFP\Associate - IFS - Application Development_PwC Indonesia\UPLOAD GitHub\ltpsm1\resources\views/dashboard/posts/index.blade.php ENDPATH**/ ?>