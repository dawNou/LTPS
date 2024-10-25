

<?php $__env->startSection('container'); ?>

<div class="d-flex flex-column flex-lg-row align-items-center"
  style="padding: 111px; padding-top: 88px; padding-left: 50px; color: azure; background-color: #800020; min-height: 100vh;">

  <!-- Konten Teks -->
  <div class="container content order-1 order-lg-1" style="padding-right: 0; margin-right: 0;">
    <h1 style="margin-bottom: 20px; font-weight: 700; font-size:54px;">
      CV Lilin Tiga Putra Sejahtera
    </h1>
    <p style="margin-bottom: 30px; color: rgba(255, 255, 255, 0.5)">
      Temukan kualitas terbaik dengan produk unggulan kami yang dirancang untuk memenuhi kebutuhan anda
    </p>
    <p>
      <a href="/produks" class="btn btn-secondary me-2"
        style="font-weight:600; padding: 12px 30px; border-radius: 30px; margin-bottom: 50px; color: #2f2f2f; background: #f9bf29; border-color: green">Temukan
        Produk>>>
      </a>
    <p style="margin-bottom: 10px; color: rgba(255, 255, 255, 0.5)">
      Apakah ingin menanyakan sesuatu? Silahkan klik tombol di bawah ini
    </p>
    <a href="<?php echo e(route('dashboard.chatify')); ?>" class="btn btn-secondary me-2"
      style="font-weight:600; padding: 12px 30px; border-radius: 30px; color: #2f2f2f; background: green; border-color: #f9bf29">
      <i class="bi bi-chat-dots-fill"></i> Chat Admin
    </a>
    </p>
  </div>

  <!-- Carousel -->
  <div id="carouselExampleIndicators" class="carousel slide order-0 order-lg-2" data-bs-ride="carousel"
    style="max-width: 500px; max-height: 500px; margin-left: -50px;">
    <div class="carousel-indicators">
      <?php $__currentLoopData = $produks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo e($key); ?>"
        class="<?php echo e($key == 0 ? 'active' : ''); ?>" aria-current="<?php echo e($key == 0 ? 'true' : 'false'); ?>"
        aria-label="Slide <?php echo e($key + 1); ?>"></button>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="carousel-inner">
      <?php $__currentLoopData = $produks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="carousel-item <?php echo e($key == 0 ? 'active' : ''); ?>">
        <?php if($produk->image): ?>
        <img src="<?php echo e(asset('storage/' . $produk->image)); ?>" class="d-block w-100" alt="<?php echo e($produk->nama_produk); ?>"
          style="object-fit: cover; height: 500px;">
        <?php else: ?>
        <img src="https://via.placeholder.com/500x300?text=No+Image" class="d-block w-100"
          alt="<?php echo e($produk->nama_produk); ?>" style="object-fit: cover; height: 500px;">
        <?php endif; ?>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

</div>

<div class="d-flex flex-column align-items-center" style="padding: 111px; padding-top: 88px; padding-left: 50px; color: black; background-color: #F6F5F2; min-height: 100vh;">
  <h1 class="text-center" style="font-size: 24px; font-weight: 700; margin: 0 0 10px 0; width: 100%; max-width: 800px;">
    Kami Sebagai Produsen Sekaligus Penyedia
  </h1>
  <h1 class="text-center" style="font-size: 24px; font-weight: 700; margin: 0 0 20px 0; width: 100%; max-width: 800px;">
    Siap Membantu Anda Memilih Produk
  </h1>
  <p>
    <a href="/produks" class="btn btn-secondary me-2"
      style="font-weight:600; padding: 12px 30px; border-radius: 30px; color: #2f2f2f; background: #f9bf29; border-color: #f9bf29">Temukan
      Produk>>></a>
  </p>
  <h1 class="text-center" style="font-size: 14px; font-weight: 500; margin: 0 0 20px 0; width: 100%; max-width: 800px;">
    Berikut beberapa contoh produk kami:
  </h1>
  <!-- Menampilkan produk per kategori -->
  <?php if($katprods && $katprods->count() > 0): ?>
  <div class="container">
    <div class="row">
      <?php $__currentLoopData = $katprods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $katprod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($katprod->produk->count() > 0): ?>
      <?php
      // Mengambil produk pertama dari setiap kategori
      $produk = $katprod->produk->first();
      ?>
      <div class="col-md-4 mb-3 d-flex align-items-stretch">
        <div class="card w-100">
          <?php if($produk->image): ?>
          <img src="<?php echo e(asset('storage/' . $produk->image)); ?>" alt="<?php echo e($katprod->namakatprod); ?>"
            class="card-img-top img-fluid" style="object-fit: cover; height: 350px;">
          <?php else: ?>
          <img src="..." class="card-img-top img-fluid" alt="<?php echo e($katprod->namakatprod); ?>"
            style="object-fit: cover; height: 200px;">
          <?php endif; ?>
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?php echo e($produk->nama_produk); ?></h5>
            <h5>Rp <?php echo e(number_format($produk->harga_produk, 0, ',', '.')); ?></h5>
            <p class="card-text flex-grow-1"><?php echo e($produk->excerpt); ?></p>
            <a href="/produks/<?php echo e($produk->slug); ?>" class="btn btn-primary mt-auto"
              style="background-color: #800020; color: white; border-color: #8B0000;">
              Selengkapnya >>>
            </a>
          </div>
        </div>
      </div>
      <?php else: ?>
      <p class="text-center">Produk tidak tersedia untuk kategori: <?php echo e($katprod->namakatprod); ?></p>
      <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
  <?php else: ?>
  <p class="text-center fs-4">Tidak ada kategori produk tersedia.</p>
  <?php endif; ?>
</div>

<div class="d-flex flex-column align-items-center"
  style="padding: 111px; padding-top: 88px; padding-left: 50px; color: azure; background-color: #800020; min-height: 70vh;">
  <h1 class="text-center" style="font-size: 24px; font-weight: 700; margin: 0 0 25px 0; width: 100%; max-width: 800px;">
    Alasan Memilih Produk Kami
  </h1>
  <h1 class="text-left" style="font-size: 18px; font-weight: 700; margin: 0 0 10px 0; width: 100%; max-width: 800px;">
    1. Kualitas Unggul
  </h1>
  <h1 class="text-left" style="font-size: 14px; font-weight: 400; margin: 0 0 20px 0; width: 100%; max-width: 800px;">
    Produk kami dibuat dengan bahan berkualitas tinggi dan proses pembuatan yang teliti, memastikan daya tahan dan
    performa optimal.
  </h1>

  <h1 class="text-left" style="font-size: 18px; font-weight: 700; margin: 0 0 10px 0; width: 100%; max-width: 800px;">
    2. Berusaha Memenuhi Kebutuhan
  </h1>
  <h1 class="text-left" style="font-size: 14px; font-weight: 400; margin: 0 0 20px 0; width: 100%; max-width: 800px;">
    Kami berkomitmen untuk memahami dan memenuhi kebutuhan pelanggan dengan produk yang sesuai dengan preferensi dan
    permintaan Anda.
  </h1>

  <h1 class="text-left" style="font-size: 18px; font-weight: 700; margin: 0 0 10px 0; width: 100%; max-width: 800px;">
    3. Harga Kompetitif
  </h1>
  <h1 class="text-left" style="font-size: 14px; font-weight: 400; margin: 0 0 20px 0; width: 100%; max-width: 800px;">
    Kami menawarkan harga yang bersaing tanpa mengorbankan kualitas, memberikan nilai terbaik untuk setiap produk yang
    anda pilih.
  </h1>

  <h1 class="text-left" style="font-size: 18px; font-weight: 700; margin: 0 0 10px 0; width: 100%; max-width: 800px;">
    4. Pelayanan Pelanggan Terbaik
  </h1>
  <h1 class="text-left" style="font-size: 14px; font-weight: 400; margin: 0 0 20px 0; width: 100%; max-width: 800px;">
    Tim kami berkomitmen untuk memberikan layanan pelanggan yang responsif dan ramah, memastikan pengalaman memilih
    produk yang sesuai dengan kebutuhan.
  </h1>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\8. SEMESTER 8\BISMILLAH REVISI PROGRAM\RevProgM7\ltpsm1\resources\views/home.blade.php ENDPATH**/ ?>