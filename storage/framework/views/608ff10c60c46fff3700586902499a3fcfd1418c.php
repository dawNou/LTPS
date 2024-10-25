<!-- resources/views/admin/users.blade.php -->


<?php $__env->startSection('title', 'Kelola Pengguna'); ?>

<?php $__env->startSection('container'); ?>
<div class="container" style="padding-top: 30px">
    <h2>Daftar Pengguna</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 50px; text-align: center;">NO.</th>
                <th style="text-align: center;">Nama</th>
                <th style="text-align: center;">Email</th>
                <th style="text-align: center;">Status Admin</th>
                <th style="width: 200px; text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="text-align: center;"><?php echo e($loop->iteration); ?>.</td>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td style="text-align: center;"><?php echo e($user->is_admin ? 'Admin' : 'Pengguna'); ?></td>
                    <td style="text-align: center;">
                        <?php if($user->is_admin): ?>
                            
                            <form action="<?php echo e(url('/dashboard/keloladmin/hapus/' . $user->id)); ?>" method="post" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-warning">Nonaktifkan Admin</button>
                            </form>
                        <?php else: ?>
                            
                            <form action="<?php echo e(url('/dashboard/keloladmins/tambah/' . $user->id)); ?>" method="post" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-success">Tambah Admin</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\8. SEMESTER 8\BISMILLAH REVISI PROGRAM\RevProgM7\ltpsm1\resources\views/pemilik/pengguna.blade.php ENDPATH**/ ?>