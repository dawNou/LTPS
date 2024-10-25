@extends('dashboard.layouts.main')

@section('title', 'Buat Kategori Blog')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">
    Buat Kategori Produk Baru
  </h1>
</div>

{{-- form --}}
<div class="col-lg-8">
  {{-- action digabung dengan method akan mengarah ke method store yang ada di controller--}}
  {{--
  method get => index
  method post => store
  method put => update
  method delete => destroy
  --}}
  <form method="post" action="/dashboard/katprods">

    {{-- karena menggunakan form, pake csrf --}}
    @csrf

    {{-- namakatprod --}}
    <div class="mb-3">
      <label for="namakatprod" class="form-label" style="font-weight: bold">
        Nama Kategori Produk
      </label>
      <small style="font-weight:bold; color: red">
        <sup>
          *wajib diisi
        </sup>
      </small>
      <input type="text" class="form-control @error ('namakatprod') is-invalid @enderror" id="namakatprod"
        name="namakatprod" required autofocus value="{{ old('namakatprod') }}">
      {{-- pesan error --}}
      @error('namakatprod')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    {{-- slug --}}
    <div class="mb-3">
      <label for="slug" class="form-label" style="font-weight: bold">
        Slug
      </label>
      <small style="font-weight:bold; color: red">
        <sup>
          *wajib diisi
        </sup>
      </small>
      <input type="text" class="form-control @error ('slug') is-invalid @enderror" id="slug" name="slug" required
        value="{{ old('slug') }}">
      {{-- pesan error --}}
      @error('slug')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">
      Buat Kategori Produk
    </button>

  </form>
</div>

{{-- fetch API --}}
<script>
  const namakatprod = document.querySelector('#namakatprod');
  const slug = document.querySelector('#slug');

  // nge-fetch data dari method yang akan dibuat di controller AdminKatprodController
  namakatprod.addEventListener('change', function() {
    fetch('/dashboard/katprods/checkSlug?namakatprod=' + namakatprod.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
      .catch(error => console.error('Error:', error));
  });
</script>

@endsection