

<?php $__env->startSection('title', 'Tambah Data Penjualan'); ?>

<?php $__env->startSection('container'); ?>
<h1 class="mb-4">Tambah Data Penjualan</h1>


<?php if(session()->has('success')): ?>
<div class="alert alert-success" role="alert">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<form action="/dashboard/penjualans" method="POST">
    <?php echo csrf_field(); ?>
    <div class="form-group mb-3">
        <label for="nama_pelanggan">Nama Pelanggan</label>
        <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" required>
    </div>

    <div class="form-group mb-3">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>

    <div class="form-group mb-3">
        <label for="produk_id">Produk</label>
        <select name="produk_id" id="produk_id" class="form-control" required>
            <option value="">Pilih Produk</option>
            <?php $__currentLoopData = $produks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($produk->produk_id); ?>" data-harga="<?php echo e($produk->harga_produk); ?>" data-kategori="<?php echo e($produk->katprod_id); ?>">
                    <?php echo e($produk->nama_produk); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <select name="katprod_id" id="katprod_id" class="form-control" required>
        <option value="">Pilih Kategori</option>
        <?php $__currentLoopData = $katprods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $katprod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($katprod->katprod_id); ?>"><?php echo e($katprod->namakatprod); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    
    <div class="form-group mb-3">
        <label for="kuantitas">Kuantitas</label>
        <input type="number" name="kuantitas" id="kuantitas" class="form-control" required>
    </div>

    <div class="form-group mb-3">
        <label for="harga">Harga (Rp)</label>
        <input type="text" name="harga" id="harga" class="form-control" readonly>
    </div>

    <button type="submit" class="btn btn-primary">Tambah Data Penjualan</button>
</form>

<script>
    document.getElementById('produk_id').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const hargaProduk = selectedOption.getAttribute('data-harga');
        const kategoriId = selectedOption.getAttribute('data-kategori');
        
        document.getElementById('harga').value = hargaProduk;

        // Set kategori yang sesuai pada dropdown kategori produk
        const katprodSelect = document.getElementById('katprod_id');
        katprodSelect.value = kategoriId; // Mengatur nilai dropdown kategori produk sesuai produk yang dipilih
        
        // Log untuk memastikan kategori ID diatur dengan benar
        console.log('Kategori ID:', kategoriId);
    });

    // Log ketika form disubmit
    document.querySelector('form').addEventListener('submit', function() {
        const katprodId = document.getElementById('katprod_id').value;
        console.log('Nilai katprod_id saat submit:', katprodId);
    });
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\8. SEMESTER 8\BISMILLAH REVISI PROGRAM\RevProgM7\ltpsm1\resources\views/dashboard/penjualans/create.blade.php ENDPATH**/ ?>