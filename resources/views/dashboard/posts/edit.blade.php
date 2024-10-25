@extends('dashboard.layouts.main')

@section('title', 'Ubah Data Post')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">
    Ubah Data Post
  </h1>
</div>

<div class="col-lg-8">
  {{-- tadinya cuma ('dashboard/posts') --}}
  <form method="post" action="/dashboard/posts/{{ $post->slug }}" class="mb-5" enctype="multipart/form-data">
    @method('put')
    @csrf

    {{-- ubah title --}}
    <div class="mb-3">
      <label for="title" class="form-label" style="font-weight: bold">
        Judul Baru
      </label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $post->title) }}">
      @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>

    {{-- ubah slug --}}
    <div class="mb-3">
      <label for="slug" class="form-label" style="font-weight: bold">
        Slug Baru
      </label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $post->slug) }}">
      @error('slug')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    {{-- ubah category --}}
    <div class="mb-3">
      <label for="category" class="form-label" style="font-weight: bold">
        Kategori Baru
      </label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>
      <select class="form-select" name="category_id">
        @foreach ($categories as $category)
          @if(old('category_id', $post->category_id) == $category->category_id)
            <option value="{{ $category->category_id }}" selected>{{ $category->name }}
            </option>
          @else
          <option value="{{ $category->category_id }}">{{ $category->name }}
          @endif
        @endforeach
      </select>
    </div>

    {{-- ubah image --}}
    <div class="mb-3">
      <label for="image" class="form-label" style="font-weight: bold">
        Gambar Baru
      </label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>

      <input type="hidden" name="oldImage" value="{{ $post->image }}">

      {{-- kondisi biar muncul gambarnya --}}
      @if ($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
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
        Isi Konten Baru
      </label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>
      @error('body')
      <p class="text-danger">
        {{ $message }}
      </p>
      @enderror
      <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
      <trix-editor input="body"></trix-editor>
    </div>

    {{-- tombol update --}}
    <button type="submit" class="btn btn-primary">Ubah Data Post</button>
  </form>
</div>

<script>
  const title = document.querySelector('#title');
  const slug = document.querySelector('#slug');

  title.addEventListener('change', function() {
    fetch('/dashboard/posts/checkSlug?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
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