@extends('layouts.main')

@section('container')

<div class="row justify-content-center" style="padding-top: 80px">
  <div class="col-md-4">

    {{-- login sukses --}}
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    {{-- login error --}}
    @if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('loginError') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <main class="form-signin w-100 m-auto">
      <h1 class="h3 mb-3 fw-normal text-center"
        style="padding-top: 80px; font-family: sans-serif; font-weight: bold; font-size: 34px">
        Silahkan Login
      </h1>

      <form action="/login" method="post">

        @csrf

        {{-- email --}}
        <div class="form-floating">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
            placeholder="name@example.com" autofocus required value="{{ old('email') }}">
          <label for="email">
            Email address
          </label>
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        {{-- password --}}
        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
          <label for="password">
            Password
          </label>
        </div>

        {{-- captcha --}}
        <div class="form-group mt-3 mb-3">
          <label for="captcha">
            Captcha
          </label>
          <div class="captcha">
            <span>{!! captcha_img() !!}</span>
            <button type="button" class="btn btn-success btn-refresh">
              Refresh
            </button>
          </div>
          <input type="text" name="captcha" class="form-control mt-2 @error('captcha') is-invalid @enderror"
            placeholder="Masukkan Kode Captcha" required>
          @error('captcha')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <button class="btn w-100 py-2" style="background-color: #800020; color: white; border-color: #8B0000;"
          type="submit">
          Login
        </button>
      </form>

      <small class="d-block text-center mt-3">
        Belum mempunyai akun?
        <a href="/register">
          Registrasi Sekarang!
        </a>
      </small>

      <p class="d-block text-center mt-4 mb-3 text-body-secondary">
        &copy; Lilin Tiga Putra Sejahtera | 2024
      </p>

    </main>
  </div>
</div>

<script type="text/javascript">
  document.querySelector('.btn-refresh').onclick = function() 
  {
    fetch('/refresh-captcha')
      .then(response => response.json())
      .then(data => {
        document.querySelector('.captcha span').innerHTML = data.captcha;
      });
  }
</script>

@endsection