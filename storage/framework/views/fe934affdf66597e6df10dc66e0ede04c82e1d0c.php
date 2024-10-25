

<?php $__env->startSection('container'); ?>

<h1 class="mb-3 text-center" style="padding-top: 80px"><?php echo e($title); ?></h1>

<h5 class="mb-3 text-center">
    Temukan kualitas terbaik dengan produk unggulan kami yang dirancang untuk memenuhi kebutuhan anda
</h5>

<div class="mb-4 text-center">
    <!-- Tombol Semua -->
    <a href="/produks" class="btn m-1"
        style="<?php echo e(request('katprod') ? 'background-color: white; color: #8B0000; border-color: #8B0000;' : 'background-color: #8B0000; color: white; border-color: #8B0000;'); ?>">
        Semua
    </a>

    <!-- Kategori Utama -->
    <?php $__currentLoopData = $mainCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $katprod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="/produks?katprod=<?php echo e($katprod->slug); ?>" class="btn m-1"
        style="<?php echo e(request('katprod') == $katprod->slug ? 'background-color: #8B0000; color: white; border-color: #8B0000;' : 'background-color: white; color: #8B0000; border-color: #8B0000;'); ?>">
        <?php echo e($katprod->namakatprod); ?>

    </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <!-- Dropdown Lainnya -->
    <?php if($additionalCategories->count() > 0): ?>
    <div class="btn-group">
        <button type="button" class="btn dropdown-toggle"
            style="background-color: #8B0000; color: white; border-color: #8B0000;" data-bs-toggle="dropdown"
            aria-expanded="false">
            Lainnya
        </button>
        <ul class="dropdown-menu" style="max-height: 300px; overflow-y: auto; background-color: #8B0000; color: white;">
            <?php $__currentLoopData = $additionalCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $katprod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><a class="dropdown-item" href="/produks?katprod=<?php echo e($katprod->slug); ?>"
                    style="color: white; background-color: transparent;"
                    onmouseover="this.style.backgroundColor='#800020';"
                    onmouseout="this.style.backgroundColor='transparent';"><?php echo e($katprod->namakatprod); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>
</div>

<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="/produks">
            <?php if(request('katprod')): ?>
            <input type="hidden" name="katprod" value="<?php echo e(request('katprod')); ?>">
            <?php endif; ?>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari..." name="search"
                    value="<?php echo e(request('search')); ?>">
                <button class="btn" style="background-color: #800020; color: white; border-color: #8B0000;"
                    type="submit">Cari</button>
            </div>
        </form>
    </div>
</div>

<?php if($produks->count()): ?>
<div class="card mb-3" style="background-color: #F6F5F2">

    <?php if($produks[0]->image): ?>
    <div style="display: flex; justify-content: center; align-items: center; max-height: 400px; overflow:hidden;">
        <img src="<?php echo e(asset('storage/' . $produks[0]->image)); ?>" alt="<?php echo e($produks[0]->katprod->namakatprod); ?>"
            class="img-fluid">
    </div>
    <?php else: ?>
    <img src="" alt="<?php echo e($produks[0]->katprod->namakatprod); ?>" class="img-fluid mt-3">
    <?php endif; ?>

    <div class="card-body text-center">
        <h1 class="card-title">
            <a href="/produks/<?php echo e($produks[0]->slug); ?>" class="text-decoration-none text-dark"><?php echo e($produks[0]->nama_produk); ?>

            </a>
        </h1>
        <h5>
            <small class="text-muted">
                Kategori
                <a href="/produks?katprod=<?php echo e($produks[0]->katprod->slug); ?>" class="text-decoration-none"
                    style="color: #8B0000;">
                    <?php echo e($produks[0]->katprod->namakatprod); ?>

                </a>
            </small>
        </h5>

        <h5>
            Rp <?php echo e(number_format($produks[0]->harga_produk, 0, ',', '.')); ?>

        </h5>

        <p class="card-text">
            <?php echo e($produks[0]->excerpt); ?>

        </p>

        <a href="/produks/<?php echo e($produks[0]->slug); ?>" class="text-decoration-none btn btn-primary"
            style="background-color: #800020; color: white; border-color: #8B0000;">
            Selengkapnya >>>
        </a>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php $__currentLoopData = $produks->skip(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 mb-3 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="position-absolute px-3 py-2" style="background-color: #800020">
                    <a href="/produks?katprod=<?php echo e($produk->katprod->slug); ?>" class=" text-white text-decoration-none"><?php echo e($produk->katprod->namakatprod); ?>

                    </a>
                </div>

                <?php if($produk->image): ?>
                <img src="<?php echo e(asset('storage/' . $produk->image)); ?>" alt="<?php echo e($produk->katprod->namakatprod); ?>"
                    class="card-img-top img-fluid" style="object-fit: cover; height: 350px;">
                <?php else: ?>
                <img src="..." class="card-img-top img-fluid" alt="<?php echo e($produk->katprod->namakatprod); ?>"
                    style="object-fit: cover; height: 200px;">
                <?php endif; ?>

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">
                        <?php echo e($produk->nama_produk); ?>

                    </h5>
                    <h5>
                        Rp <?php echo e(number_format($produk->harga_produk, 0, ',', '.')); ?>

                    </h5>
                    <p></p>
                    <p class="card-text flex-grow-1">
                        <?php echo e($produk->excerpt); ?>

                    </p>
                    <a href="/produks/<?php echo e($produk->slug); ?>" class="btn btn-primary mt-auto"
                        style="background-color: #800020; color: white; border-color: #8B0000;">
                        Selengkapnya >>>
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php else: ?>
<p class="text-center fs-4">Belum Terdapat Produk</p>
<?php endif; ?>

<div class="d-flex justify-content-center">
    <style>
        .pagination a {
            color: #800020 !important; 
        }
        .pagination .page-item.active .page-link {
            background-color: #800020 !important; 
            color: #fff !important; 
        }
        .pagination .page-link {
            border-color: #800020 !important; 
        }
    </style>
    <?php echo e($produks->links()); ?>

</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\8. SEMESTER 8\BISMILLAH REVISI PROGRAM\RevProgM7\ltpsm1\resources\views/produks.blade.php ENDPATH**/ ?>