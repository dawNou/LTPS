@extends('dashboard.layouts.main')

@section('title', 'Buat Post')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Buat Konten Baru</h1>
</div>

<div class="col-lg-8">
  <form method="post" action="{{ url('dashboard/posts') }}" class="mb-5" enctype="multipart/form-data">
    @csrf

    {{-- title --}}
    <div class="mb-3">
      <label for="title" class="form-label" style="font-weight: bold">
        Judul
      </label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required
        autofocus value="{{ old('title') }}">
      @error('title')
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
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required
        value="{{ old('slug') }}">

      @error('slug')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    {{-- category --}}
    <div class="mb-3">
      <label for="category_id" class="form-label" style="font-weight: bold">
        Kategori
      </label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>
      <select id="category_id" class="form-select" name="category_id">
        @foreach ($categories as $category)
        <option value="{{ $category->category_id }}" {{ old('category_id')==$category->category_id ? 'selected' : '' }}>
          {{ $category->name }}
        </option>
        @endforeach
      </select>
    </div>

    {{-- image --}}
    <div class="mb-3">
      <label for="image" class="form-label" style="font-weight: bold">
        Gambar Konten
      </label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>

      <img class="img-preview img-fluid mb-3 col-sm-5">

      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"
        onchange="previewImage()">

      @error('image')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    {{-- body --}}
    <div class="mb-3">
      <label for="body" class="form-label" style="font-weight: bold">
        Isi Konten
      </label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>

      @error('body')
      <p class="text-danger">
        {{ $message }}
      </p>
      @enderror
      <input id="body" type="hidden" name="body" value="{{ old('body') }}">
      <trix-editor input="body"></trix-editor>
    </div>

    <button type="submit" class="btn btn-primary">Buat Konten Baru</button>
  </form>
</div>

<script>
  const categorySelect = document.querySelector('#category_id');
  const titleInput = document.querySelector('#title');
  const bodyInput = document.querySelector('#body');
  const trixEditor = document.querySelector('trix-editor');

  categorySelect.addEventListener('change', function() {
    const categoryId = this.value;

    if (categoryId) {
      fetch(`/dashboard/categories/${categoryId}/keywords`)
        .then(response => response.json())
        .then(keywords => {
          console.log('Keywords received:', keywords); // Debugging

          // Menggabungkan kata kunci menjadi satu string
          let keywordsText = keywords.map(keyword => keyword.keyword).join(' ');

          // Menampilkan kata kunci di kolom judul
          titleInput.value = keywordsText;

          // Menampilkan kata kunci di kolom body (trix-editor)
          // trixEditor.editor.setSelectedRange([0, 0]);
          // Menghapus konten lama dari trix-editor
        trixEditor.editor.setSelectedRange([0, trixEditor.editor.getDocument().getLength()]);
        trixEditor.editor.deleteInDirection("backward");
          trixEditor.editor.insertString(keywordsText);
        })
        .catch(error => console.error('Error fetching keywords:', error));
    } else {
      titleInput.value = '';
      trixEditor.editor.setSelectedRange([0, 0]);
      trixEditor.editor.insertString('');
    }
  });

  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  })

  // Buat preview image sebelum upload
  function previewImage () {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }

</script>

@endsection