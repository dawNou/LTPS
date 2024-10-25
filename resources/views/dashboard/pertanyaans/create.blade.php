@extends('dashboard.layouts.main')

@section('title', 'Buat Pertanyaan Baru')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">
    Buat Pertanyaan Baru
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
  <form method="post" action="/dashboard/pertanyaans">

    {{-- karena menggunakan form, pake csrf --}}
    @csrf

    {{-- soal --}}
    <div class="mb-3">
      <label for="soal" class="form-label" style="font-weight: bold">
        Pertanyaan
      </label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>
      <input type="text" class="form-control @error ('soal') is-invalid @enderror" id="soal" name="soal" required autofocus value="{{ old('soal') }}">
      {{-- pesan error --}}
      @error('soal')
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
      <input type="text" class="form-control @error ('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
      {{-- pesan error --}}
      @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>

    {{-- category product --}}
    <div class="mb-3">
      <label for="katprod" class="form-label" style="font-weight: bold">
        Kategori Produk
      </label>
      <small style="font-weight:bold; color: red">
        <sup>
          *wajib diisi
        </sup>
      </small>
      <select class="form-select" name="katprod_id">
        @foreach ($katprods as $katprod)
          @if(old('katprod_id') == $katprod->katprod_id)
            <option value="{{ $katprod->katprod_id }}" selected>{{ $katprod->namakatprod }}
            </option>
          @else
          <option value="{{ $katprod->katprod_id }}">{{ $katprod->namakatprod }}</option>
          @endif
        @endforeach
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Buat Pertanyaan</button>
  </form>
</div>

{{-- fetch API --}}
<script>
  const soal = document.querySelector('#soal');
  const slug = document.querySelector('#slug');

  // nge-fetch data dari method yang akan dibuat di controller AdminPertanyaanController
  soal.addEventListener('change', function() {
    fetch('/dashboard/pertanyaans/checkSlug?soal=' + soal.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });
</script>

@endsection