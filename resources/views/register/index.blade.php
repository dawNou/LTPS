@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
  <div class="col-lg-5" style="padding-top: 80px">
    <main class="form-registration w-100 m-auto">
      <h1 class="h3 mb-3 fw-normal text-center"
        style="padding-top: 80px; font-family: sans-serif; font-weight: bold; font-size: 34px">
        Formulir Registrasi
      </h1>
      <form action="/register" method="post">
        @csrf

        {{-- name --}}
        <div class="form-floating">
          <input type="text" name="name" class="form-control rounded-top @error('name')is-invalid @enderror" id="name"
            placeholder="Name" autofocus required value="{{ old('name') }}">
          <label for="name">
            Name
          </label>
          @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
    
        {{-- username --}}
        <div class="form-floating">
          <input type="text" name="username" class="form-control @error('username')is-invalid @enderror" id="username"
            placeholder="Username" required value="{{ old('username') }}">
          <label for="name">
            Username
          </label>
          @error('username')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        {{-- email --}}
        <div class="form-floating">
          <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="email"
            placeholder="name@example.com" required value="{{ old('email') }}">
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
          <input type="password" name="password"
            class="form-control rounded-bottom @error('password')is-invalid @enderror" id="password"
            placeholder="Password" required>
          <label for="password">Password</label>
          @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <button class="btn w-100 py-2 mt-3" style="background-color: #800020; color: white; border-color: #8B0000;"
          type="submit">Register</button>
      </form>

      <small class="d-block text-center mt-3">
        Sudah memiliki akun? <a href="/login">Login</a>
      </small>

      <p class="d-block text-center mt-4 mb-3 text-body-secondary">&copy; Lilin Tiga Putra Sejahtera | 2024</p>

    </main>
  </div>
</div>

@endsection