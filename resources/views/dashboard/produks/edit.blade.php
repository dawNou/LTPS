@extends('dashboard.layouts.main')

@section('title', 'Ubah Data Produk')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">
    Ubah Data Produk
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
  <form method="post" action="/dashboard/produks/{{ $produk->slug }}" class="mb-5" enctype="multipart/form-data">

    @method('put')

    {{-- karena menggunakan form, pake csrf --}}
    @csrf

    {{-- nama_produk --}}
    <div class="mb-3">
      <label for="nama_produk" class="form-label" style="font-weight: bold">
        Nama Produk Baru
      </label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>
      <input type="text" class="form-control @error ('nama_produk') is-invalid @enderror" id="nama_produk" name="nama_produk" required autofocus value="{{ old('nama_produk', $produk->nama_produk) }}">
      {{-- pesan error --}}
      @error('nama_produk')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>

    {{-- slug --}}
    <div class="mb-3">
      <label for="slug" class="form-label" style="font-weight: bold">
        Slug Baru
      </label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>
      <input type="text" class="form-control @error ('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $produk->slug) }}">
      {{-- pesan error --}}
      @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>

    {{-- ubah harga produk --}}
    <div class="mb-3">
      <label for="harga_produk" class="form-label" style="font-weight: bold">
        Harga Produk Baru
      </label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>
      <input type="text" class="form-control @error ('harga_produk') is-invalid @enderror" id="harga_produk"
        name="harga_produk" required value="{{ old('harga_produk', $produk->harga_produk) }}">
      {{-- pesan error --}}
      @error('harga_produk')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    {{-- ubah katprod --}}
    <div class="mb-3">
      <label for="katprod" class="form-label" style="font-weight: bold">
        Kategori Produk Baru
      </label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>
      <select class="form-select" name="katprod_id">
        @foreach ($katprods as $katprod)
          <option value="{{ $katprod->katprod_id }}" {{ old('katprod_id', $produk->katprod_id) == $katprod->katprod_id ?
            'selected' : '' }}>
            {{ $katprod->namakatprod }}
          </option>
        @endforeach
      </select>
    </div>

    {{-- ubah image --}}
    <div class="mb-3">
      <label for="image" class="form-label" style="font-weight: bold">
        Gambar Baru
      </label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>

      <input type="hidden" name="oldImage" value="{{ $produk->image }}">

      {{-- kondisi biar muncul gambarnya --}}
      @if ($produk->image)
        <img src="{{ asset('storage/' . $produk->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
      @else
          <img class="img-preview img-fluid mb-3 col-sm-5">
      @endif

      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">

      @error('image')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    {{-- ubah body --}}
    <div class="mb-3">
      <label for="body" class="form-label" style="font-weight: bold">
        Deskripsi Produk Baru
      </label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>
      @error('body')
      <p class="text-danger">
        {{ $message }}
      </p>
      @enderror
      <input id="body" type="hidden" name="body" value="{{ old('body', $produk->body) }}">
      <trix-editor input="body"></trix-editor>
    </div>

    <button type="submit" class="btn btn-primary">Perbarui Data Produk</button>
  </form>
</div>

{{-- fetch API --}}
<script>
  const nama_produk = document.querySelector('#nama_produk');
  const slug = document.querySelector('#slug');

  // nge-fetch data dari method yang akan dibuat di controller AdminprodukController
  nama_produk.addEventListener('change', function() {
    fetch('/dashboard/produks/checkSlug?nama_produk=' + nama_produk.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
      .catch(error => console.error('Error:', error));
  });

  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  })

  // buat preview image sebelum upload
  function previewImage () {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector
    ('.img-preview')

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }

</script>

@endsection