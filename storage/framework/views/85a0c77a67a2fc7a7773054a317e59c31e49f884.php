<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Umpan Balik</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .table-responsive {
      margin-top: 20px;
    }

    .table th, .table td {
      vertical-align: middle;
    }

    .table thead th {
      background-color: #343a40;
      color: #ffffff;
    }

    .table tbody tr:nth-child(odd) {
      background-color: #e9ecef;
    }

    .table tbody tr:hover {
      background-color: #adb5bd;
      color: #ffffff;
    }

    .header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 10px;
      padding: 10px 0;
      border-bottom: 2px solid #343a40;
    }

    .header img {
      max-width: 100px;
    }

    .header .company-info {
      text-align: right;
    }

    .header .company-info h1 {
      margin: 0;
      font-size: 24px;
    }

    .header .company-info p {
      margin: 0;
      font-size: 16px;
      color: #6c757d;
    }

    .date-info {
      text-align: right;
      margin-bottom: 30px;
      font-size: 16px;
      color: #6c757d;
    }

    .signature-section {
      margin-top: 50px;
      display: flex;
      justify-content: flex-end;
      text-align: center;
    }

    .signature-section .signature {
      margin-right: 50px;
    }

    .signature-section .signature p {
      margin: 0;
      font-size: 16px;
    }

    .signature-section .signature .name {
      margin-top: 80px;
      font-weight: bold;
      text-decoration: underline;
    }

    .signature-section .signature .title {
      margin-top: -10px;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Header Section -->
    <div class="header">
      <img src="img/logo.jpg" alt="Logo Perusahaan">
      <div class="company-info">
        <h1>Lilin Tiga Putra Sejahtera</h1>
        <p>Jl. Dworowati, Dusun I, Grogol, Kec. Grogol, Kabupaten Sukoharjo, Jawa Tengah 57552</p>
      </div>
    </div>

    <!-- Date Info -->
    <div class="date-info">
      <p>Tanggal Laporan: <?php echo e(\Carbon\Carbon::now()->locale('id_ID')->isoFormat('dddd, DD MMMM YYYY, HH:mm')); ?></p>
    </div>

    <!-- Report Content -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Laporan Umpan Balik</h1>
    </div>

    <div class="table-responsive col-lg-9">
      <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userId => $userFeedbacks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <h3>Pelanggan: <?php echo e($userFeedbacks->first()->user->name); ?></h3>
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

    <!-- Signature Section -->
    <div class="signature-section">
      <div class="signature">
        <p>Diketahui oleh,</p>
        <p class="name">Bapak Setion</p>
        <p class="title">-Pemilik-</p>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php /**PATH D:\KULIAH\8. SEMESTER 8\BISMILLAH REVISI PROGRAM\RevProgM7\ltpsm1\resources\views/dashboard/feedbacks/pdf.blade.php ENDPATH**/ ?>