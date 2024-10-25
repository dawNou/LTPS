<nav class="navbar navbar-expand-lg navbar-dark fixed-top"
  style="padding-top: 10px; padding-bottom: 10px; font-family: sans-serif;background-color: #800020">
  <div class="container">
    <a class="navbar-brand" href="/">LTPS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ ($active === "beranda") ? 'active' : '' }}" href="/">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($active === "produks") ? 'active' : '' }}" href="/produks">Produk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($active === "posts") ? 'active' : '' }}" href="/posts">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($active === "tentangKami") ? 'active' : '' }}" href="/tentangKami">Tentang Kami</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/chatify*') ? 'active' : '' }}"
            href="{{ route('dashboard.chatify') }}">Live Chat</a>
        </li>
      </ul>

      {{-- navbar login --}}
      <ul class="navbar-nav ms-auto">
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome back, {{ auth()->user()->name }}
          </a>

          {{-- dropdown Dashboard --}}
          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item" href="/dashboard">
                <i class="bi bi-layout-text-sidebar"></i>
                My Dashboard
              </a>
            </li>

            {{-- garis pembatas --}}
            <li>
              <hr class="dropdown-divider">
            </li>

            {{-- dropdown Logout --}}
            <li>
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item">
                  <i class="bi bi-box-arrow-right"></i>
                  Logout
                </button>
              </form>
            </li>
          </ul>
        </li>
        @else
        <li class="nav-item">
          <a href="/login" class="nav-link {{ ($active === " login") ? 'active' : '' }}">
            <i class="bi bi-box-arrow-in-right"></i>
            Login
          </a>
        </li>
        @endauth
      </ul>

    </div>
  </div>
</nav>