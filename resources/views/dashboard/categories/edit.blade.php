@extends('dashboard.layouts.main')

@section('title', 'Ubah Data Kategori Blog')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">
    Ubah Data Kategori
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
  <form method="post" action="/dashboard/categories/{{ $category->slug }}" class="mb-5">

    @method('put')

    {{-- karena menggunakan form, pake csrf --}}
    @csrf

    {{-- name --}}
    <div class="mb-3">
      <label for="name" class="form-label" style="font-weight: bold">
        Nama Kategori Baru
      </label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>
      <input type="text" class="form-control @error ('name') is-invalid @enderror" id="name" name="name" required
        autofocus value="{{ old('name', $category->name) }}">
      {{-- pesan error --}}
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    {{-- slug --}}
    <div class="mb-3">
      <label for="slug" class="form-label"  style="font-weight: bold">
        Slug Baru
      </label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>
      <input type="text" class="form-control @error ('slug') is-invalid @enderror" id="slug" name="slug" required
        value="{{ old('slug', $category->slug) }}">
      {{-- pesan error --}}
      @error('slug')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    {{-- Kata Kunci --}}
    <div class="mb-3">
      <label class="form-label" style="font-weight: bold">
        Pilih Kata Kunci
      {{-- </label><small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small> --}}
      </label>
      <div class="row">
        @foreach($keywords as $index => $keyword)
        <div class="col-md-3">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="keywords[]" id="keyword{{ $keyword->keyword_id }}"
              value="{{ $keyword->keyword_id }}" @if(isset($category) && $category->keywords->contains($keyword->keyword_id)) checked
              @endif>
            <label class="form-check-label" for="keyword{{ $keyword->keyword_id }}">
              {{ $keyword->keyword }}
            </label>
          </div>
        </div>
        @if(($index + 1) % 4 == 0)
      </div>
      <div class="row">
        @endif
        @endforeach
      </div>
    </div>

    <button type="submit" class="btn btn-primary">Perbarui Data Kategori Post</button>
  </form>
</div>

{{-- fetch API --}}
<script>
  const name = document.querySelector('#name');
  const slug = document.querySelector('#slug');

  // nge-fetch data dari method yang akan dibuat di controller AdminCategoryController
  name.addEventListener('change', function() {
    fetch('/dashboard/categories/checkSlug?name=' + name.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });
</script>

@endsection