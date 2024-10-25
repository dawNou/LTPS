

<?php $__env->startSection('title', 'Kata Kunci'); ?>

<?php $__env->startSection('container'); ?>


<?php if(session()->has('success')): ?>
<div class="alert alert-success col-lg-8" style="margin-top: 20px" role="alert">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>


<?php if(session()->has('error')): ?>
<div class="alert alert-danger col-lg-8" role="alert">
    <?php echo e(session('error')); ?>

</div>
<?php endif; ?>

<small style="font-weight: bold; color: red; display: block; margin-top: 15px;">*Proses ekstraksi data umpan balik</small>

<form action="<?php echo e(route('feedback.proses')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <button type="submit" class="btn btn-success mb-3">Proses Kata Kunci</button>
</form>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" style="font-weight: bold;">Daftar Kata Kunci</h1>
</div>

<div class="container">
    <div class="grid-container" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1rem;">
        <?php $__currentLoopData = $chunks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="grid-item">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 70%; text-align: center;">Daftar Kata Kunci</th>
                            <th scope="col" style="width: 20%; text-align: center;">Frekuensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyword): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="text-align: center;"><?php echo e($keyword->keyword); ?></td>
                            <td style="text-align: center;"><?php echo e($keyword->frequency); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\8. SEMESTER 8\BISMILLAH REVISI PROGRAM\RevProgM7\ltpsm1\resources\views/dashboard/keywords/index.blade.php ENDPATH**/ ?>