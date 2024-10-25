

<?php $__env->startSection('title', 'Daftar Penjualan'); ?>

<?php $__env->startSection('container'); ?>
<h1 class="mb-4">Daftar Penjualan</h1>


<?php if(session()->has('success')): ?>
<div class="alert alert-success col-lg-7" role="alert">
  <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<a href="/dashboard/penjualans/create" class="btn btn-primary mt-1 mb-3">Tambah Penjualan Baru</a>

<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col" style="width: 5%; text-align: center;">NO.</th>
        <th scope="col" style="text-align: center;">Nama Pelanggan</th>
        <th scope="col" style="text-align: center;">Email</th>
        <th scope="col" style="text-align: center;">Produk</th>
        <th scope="col" style="text-align: center;">Kuantitas</th>
        <th scope="col" style="text-align: center;">Harga</th>
        <th scope="col" style="text-align: center;">Total</th>
        <th scope="col" style="text-align: center;">Tindakan</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $penjualans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $penjualan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td style="text-align: center;"><?php echo e($loop->iteration); ?>.</td>
        <td><?php echo e($penjualan->nama_pelanggan); ?></td>
        <td><?php echo e($penjualan->email); ?></td>
        <td><?php echo e($penjualan->produk->nama_produk); ?></td>
        <td style="text-align: center;"><?php echo e($penjualan->kuantitas); ?></td>
        <td style="text-align: center;">Rp <?php echo e(number_format($penjualan->harga, 0, ',', '.')); ?></td>
        <td style="text-align: center;">Rp <?php echo e(number_format($penjualan->kuantitas * $penjualan->harga, 0, ',', '.')); ?></td>
        <td style="text-align: center;">
          <a href="/dashboard/penjualans/<?php echo e($penjualan->penjualan_id); ?>/edit" class="btn btn-warning btn-sm">Edit</a>
          <form action="/dashboard/penjualans/<?php echo e($penjualan->penjualan_id); ?>" method="POST" class="d-inline">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button class="btn btn-danger btn-sm"
              onclick="return confirm('Apakah Anda yakin ingin menghapus penjualan ini?')">Hapus</button>
          </form>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\8. SEMESTER 8\BISMILLAH REVISI PROGRAM\RevProgM7\ltpsm1\resources\views/dashboard/penjualans/index.blade.php ENDPATH**/ ?>