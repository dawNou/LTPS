<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
  <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
    aria-labelledby="sidebarMenuLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="sidebarMenuLabel">LTPS Blog</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
        aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
      <ul class="nav flex-column">

        
        <li class="nav-item">
          <a class="nav-link <?php echo e(Request::is('dashboard') ? 'active' : ''); ?>" style="font-size:17px; font-weight:600;"
            aria-current="page" href="/dashboard">
            <i class="bi bi-house-door-fill"></i>
            Dashboard
          </a>
        </li>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('admin')): ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('pemilik')): ?>

        
        <li class="nav-item">
          <a class="nav-link <?php echo e(Request::is('/dashborad/chatify*') ? 'active' : ''); ?>"
            style="font-size:17px; font-weight:600;" href="<?php echo e(route('dashboard.chatify')); ?>">
            <i class="bi bi-chat-dots-fill"></i>
            Live Chat
          </a>
        </li>

        
        <li class="nav-item">
          <a class="nav-link <?php echo e(Request::is('dashboard/feedbacks*') ? 'active' : ''); ?>"
            style="font-size:17px; font-weight:600;" href="/dashboard/feedbacks">
            <i class="bi bi-person-lines-fill"></i></i>
            Umpan Balik Saya
          </a>
        </li>
        <?php endif; ?>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pemilik')): ?>
        
        <li class="nav-item">
          <a class="nav-link <?php echo e(Request::is('dashboard/keloladmins*') ? 'active' : ''); ?>"
            style="font-size:17px; font-weight:600;" href="/dashboard/keloladmins">
            <i class="bi bi-people-fill"></i>
            Kelola Akun
          </a>
        </li>

        <hr class="my-1">

        
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('feedbacks/tampil*') ? 'active' : ''); ?>"
              style="font-size:17px; font-weight:600;" href="<?php echo e(route('feedbacks.tampil')); ?>">
              <i class="bi bi-person-lines-fill"></i>
              Umpan Balik
            </a>
          </li>
        </ul>

        
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('kontens/tampil*') ? 'active' : ''); ?>"
              style="font-size:17px; font-weight:600;" href="<?php echo e(route('kontens.tampil')); ?>">
              <i class="bi bi-file-earmark-text-fill"></i>
              Konten Blog
            </a>
          </li>
        </ul>

        <?php endif; ?>

      </ul>

      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"
        style="font-size: 17px;">
        <span>
          ADMINISTRATOR
        </span>
      </h6>

      <hr class="my-1">

      
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link <?php echo e(Request::is('/dashborad/chatify*') ? 'active' : ''); ?>"
            style="font-size:17px; font-weight:600;" href="<?php echo e(route('dashboard.chatify')); ?>">
            <i class="bi bi-chat-dots-fill"></i>
            Live Chat
          </a>
        </li>
      </ul>

      <hr class="my-1">

      
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link <?php echo e(Request::is('dashboard/adminfeedbacks*') ? 'active' : ''); ?>"
            style="font-size:17px; font-weight:600;" href="/dashboard/adminfeedbacks">
            <i class="bi bi-person-lines-fill"></i></i>
            Umpan Balik
          </a>
        </li>
      </ul>

      
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link <?php echo e(Request::is('dashboard/keywords*') ? 'active' : ''); ?>"
            style="font-size:17px; font-weight:600;" href="/dashboard/keywords">
            <i class="bi bi-key"></i>
            Kata Kunci
          </a>
        </li>
      </ul>

      <hr class="my-1">

      
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link <?php echo e(Request::is('dashboard/categories*') ? 'active' : ''); ?>"
            style="font-size:17px; font-weight:600;" href="/dashboard/categories">
            <i class="bi bi-collection"></i>
            Kategori Blog
          </a>
        </li>
      </ul>

      
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link <?php echo e(Request::is('dashboard/posts*') ? 'active' : ''); ?>"
            style="font-size:17px; font-weight:600;" href="/dashboard/posts">
            <i class="bi bi-file-earmark-text-fill"></i>
            Konten Blog
          </a>
        </li>
      </ul>

      <hr class="my-1">

      
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link <?php echo e(Request::is('dashboard/produks*') ? 'active' : ''); ?>"
            style="font-size:17px; font-weight:600;" href="/dashboard/produks">
            <i class="bi bi-columns-gap"></i>
            Produk
          </a>
        </li>
      </ul>

      
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link <?php echo e(Request::is('dashboard/katprods*') ? 'active' : ''); ?>"
            style="font-size:17px; font-weight:600;" href="/dashboard/katprods">
            <i class="bi bi-collection"></i>
            Kategori Produk
          </a>
        </li>
      </ul>

      
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link <?php echo e(Request::is('dashboard/pertanyaans*') ? 'active' : ''); ?>"
            style="font-size:17px; font-weight:600;" href="/dashboard/pertanyaans">
            <i class="bi bi-list-columns-reverse"></i>
            Daftar Pertanyaan
          </a>
        </li>
      </ul>
      
      </ul>

      <?php endif; ?>

      <hr class="my-1">

      <ul class="nav flex-column mb-auto">

        <li class="nav-item">
          <form action="/logout" method="post">
            <?php echo csrf_field(); ?>
            <button type="submit" class="nav-link gap-2" style="font-size:17px; font-weight:600;">
              <i class="bi bi-box-arrow-right"></i> Logout
            </button>
          </form>
        </li>

      </ul>
    </div>
  </div>
</div><?php /**PATH D:\KULIAH\8. SEMESTER 8\BISMILLAH REVISI PROGRAM\RevProgM7\ltpsm1\resources\views/dashboard/layouts/sidebar.blade.php ENDPATH**/ ?>