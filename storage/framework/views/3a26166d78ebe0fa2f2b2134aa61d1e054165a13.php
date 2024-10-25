

<?php $__env->startSection('container'); ?>

<h1 class="mb-3 text-center" style="padding-top: 80px"><?php echo e($title); ?></h1>

<div class="mb-4 text-center">
  <!-- Tombol Semua -->
  <a href="/posts" 
     class="btn m-1" 
     style="<?php echo e(request('category') ? 'background-color: white; color: #8B0000; border-color: #8B0000;' : 'background-color: #8B0000; color: white; border-color: #8B0000;'); ?>">
      Semua
  </a>

  <!-- Kategori Utama -->
  <?php $__currentLoopData = $mainCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <a href="/posts?category=<?php echo e($category->slug); ?>" 
         class="btn m-1" 
         style="<?php echo e(request('category') == $category->slug ? 'background-color: #8B0000; color: white; border-color: #8B0000;' : 'background-color: white; color: #8B0000; border-color: #8B0000;'); ?>">
          <?php echo e($category->name); ?>

      </a>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  <!-- Dropdown Kategori Lainnya -->
  <?php if($additionalCategories->count() > 0): ?>
      <div class="btn-group">
          <button type="button" class="btn dropdown-toggle" 
                  style="background-color: #8B0000; color: white; border-color: #8B0000;" 
                  data-bs-toggle="dropdown" aria-expanded="false">
              Lainnya
          </button>
          <ul class="dropdown-menu" 
              style="background-color: #8B0000; color: white; max-height: 300px; overflow-y: auto;">
              <?php $__currentLoopData = $additionalCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><a class="dropdown-item" 
                         href="/posts?category=<?php echo e($category->slug); ?>" 
                         style="color: white; background-color: transparent;" 
                         onmouseover="this.style.backgroundColor='#800020';" 
                         onmouseout="this.style.backgroundColor='transparent';">
                         <?php echo e($category->name); ?>

                  </a></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
      </div>
  <?php endif; ?>
</div>

<div class="row justify-content-center mb-3">
  <div class="col-md-6">
    <form action="/posts">
      <?php if(request('category')): ?>
      <input type="hidden" name="category" value="<?php echo e(request('category')); ?>">
      <?php endif; ?>
      <?php if(request('author')): ?>
      <input type="hidden" name="author" value="<?php echo e(request('author')); ?>">
      <?php endif; ?>
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari..." name="search" value="<?php echo e(request('search')); ?>">
        <button class="btn" style="background-color: #800020; color: white; border-color: #8B0000;" type="submit">Cari</button>
      </div>
    </form>
  </div>
</div>

<?php if($posts->count()): ?>
<div class="card mb-3" style="background-color: #F6F5F2">

  <?php if($posts[0]->image): ?>
  <div style="display: flex; justify-content: center; align-items: center; max-height: 400px; overflow:hidden;">
    <img src="<?php echo e(asset('storage/' . $posts[0]->image)); ?>" alt="<?php echo e($posts[0]->category->name); ?>" class="img-fluid">
  </div>
  <?php else: ?>
  <img src="" alt="<?php echo e($posts[0]->category->name); ?>" class="img-fluid mt-3">
  <?php endif; ?>

  <div class="card-body text-center">
    <h3 class="card-title">
      <a href="/posts/<?php echo e($posts[0]->slug); ?>" class="text-decoration-none text-dark"><?php echo e($posts[0]->title); ?>

      </a>
    </h3>
    <p>
      <small class="text-muted">
        Oleh
        <a href="/posts?author=<?php echo e($posts[0]->author->username); ?>" class="text-decoration-none" style="color: #8B0000;"><?php echo e($posts[0]->author->name); ?>

        </a>
        dengan Kategori
        <a href="/posts?category=<?php echo e($posts[0]->category->slug); ?>" class="text-decoration-none" style="color: #8B0000;"><?php echo e($posts[0]->category->name); ?>

        </a> <?php echo e($posts[0]->created_at->diffForHumans()); ?>

      </small>
    </p>

    <p class="card-text">
      <?php echo e($posts[0]->excerpt); ?>

    </p>

    <a href="/posts/<?php echo e($posts[0]->slug); ?>" class="text-decoration-none btn btn-primary" style="background-color: #800020; color: white; border-color: #8B0000;">
      Selengkapnya >>>
    </a>

  </div>
</div>

<div class="container">
  <div class="row">
    <?php $__currentLoopData = $posts->skip(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-4 mb-3 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="position-absolute px-3 py-2" style="background-color: #800020">
          <a href="/posts?category=<?php echo e($post->category->slug); ?>" class=" text-white text-decoration-none"><?php echo e($post->category->name); ?>

          </a>
        </div>

        <?php if($post->image): ?>
        <img src="<?php echo e(asset('storage/' . $post->image)); ?>" alt="<?php echo e($post->category->name); ?>" class="card-img-top img-fluid" style="object-fit: cover; height: 350px;">
        <?php else: ?>
        <img src="..." class="card-img-top img-fluid" alt="<?php echo e($post->category->name); ?>" style="object-fit: cover; height: 200px;">
        <?php endif; ?>

        <div class="card-body d-flex flex-column">
          <h5 class="card-title"><?php echo e($post->title); ?></h5>
          <p>
            <small class="text-muted">
              Oleh <a href="/posts?author=<?php echo e($post->author->username); ?>" class="text-decoration-none" style="color: #8B0000;"><?php echo e($post->author->name); ?></a> <?php echo e($post->created_at->diffForHumans()); ?>

            </small>
          </p>
          <p class="card-text flex-grow-1"><?php echo e($post->excerpt); ?></p>
          <a href="/posts/<?php echo e($post->slug); ?>" class="btn btn-primary mt-auto" style="background-color: #800020; color: white; border-color: #8B0000;">Selengkapnya >>></a>
        </div>
      </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</div>

<?php else: ?>
<p class="text-center fs-4">Belum Terdapat Konten Blog</p>
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
  <?php echo e($posts->links()); ?>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\JOURNEY RFP\Associate - IFS - Application Development_PwC Indonesia\UPLOAD GitHub\ltpsm1\resources\views/posts.blade.php ENDPATH**/ ?>