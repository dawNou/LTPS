

<?php $__env->startSection('title', 'Daftar Pertanyaan'); ?>

<?php $__env->startSection('container'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Daftar Pertanyaan</h1>
</div>


<?php if(session()->has('success')): ?>
    <div class="alert alert-success col-lg-7" role="alert">
      <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<div class="table-responsive col-lg-10">

  
  
  <a href="/dashboard/pertanyaans/create" class="btn btn-primary mb-3">
    Buat Pertanyaan Baru
  </a>
  <table class="table table-striped table-sm mb-3">
    <thead>
      <tr>
        <th scope="col" style="width: 5%; text-align: center;">NO.</th>
        <th scope="col" style="text-align: center;">Daftar Pertanyaan</th>
        <th scope="col" style="width: 15%; text-align: center;">Kategori Produk</th>
        <th scope="col" style="width: 10%; text-align: center;">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $pertanyaans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pertanyaan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td style="text-align: center;"><?php echo e($loop->iteration); ?>.</td>
        <td><?php echo e($pertanyaan->soal); ?></td>
        <td style="text-align: center;"><?php echo e($pertanyaan->katprod->namakatprod ?? 'Tidak ada kategori'); ?></td>
        <td style="text-align: center;">

          
          <a href="/dashboard/pertanyaans/<?php echo e($pertanyaan->slug); ?>/edit" class="badge bg-warning">
            <i class="bi bi-pencil-square"></i>
          </a>

          
          <form action="/dashboard/pertanyaans/<?php echo e($pertanyaan->slug); ?>" method="post" class="d-inline">
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
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\8. SEMESTER 8\BISMILLAH REVISI PROGRAM\RevProgM7\ltpsm1\resources\views/dashboard/pertanyaans/index.blade.php ENDPATH**/ ?>