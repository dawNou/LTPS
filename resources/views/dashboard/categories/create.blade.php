@extends('dashboard.layouts.main')

@section('title', 'Buat Kategori Blog')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">
    Buat Kategori Blog Baru
  </h1>
</div>

{{-- form --}}
<div class="col-lg-8">
  <form method="post" action="/dashboard/categories">
    @csrf

    {{-- name --}}
    <div class="mb-3">
      <label for="name" class="form-label" style="font-weight: bold">
        Nama Kategori Blog
      </label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required
        autofocus value="{{ old('name') }}">
      @error('name')
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

    <div class="mb-3">
      <label class="form-label" style="font-weight: bold">Cek Kata Kunci yang Cocok</label>
      <small style="font-weight:bold; color: red"><sup>*wajib diisi</sup></small>
      <div id="matched-keywords" class="row"></div>
    </div>

    <button type="button" class="btn btn-secondary" id="check-keywords">
      Cek Kata Kunci
    </button>

    <button type="submit" class="btn btn-primary">Buat Kategori Baru</button>
  </form>
  <div id="keyword-results" class="mt-3"></div>
</div>

{{-- fetch API --}}
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.querySelector('#name');
    const slug = document.querySelector('#slug');
    const checkKeywordsBtn = document.querySelector('#check-keywords');
    const keywordResults = document.querySelector('#keyword-results');

    // Fetch slug ketika nama kategori berubah
    nameInput.addEventListener('change', function() {
      fetch(`/dashboard/categories/checkSlug?name=${encodeURIComponent(nameInput.value)}`)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
        .catch(error => console.error('Error:', error));
    });

    // Fetch kata kunci ketika tombol cek diklik
    checkKeywordsBtn.addEventListener('click', function() {
      const nameValue = encodeURIComponent(nameInput.value);

      fetch(`/dashboard/categories/checkKeywords?name=${nameValue}`)
        .then(response => response.json())
        .then(data => {
          keywordResults.innerHTML = '';
          if (data.matchedKeywords.length > 0) {
            let resultsHtml = `
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Kata Kunci</th>
                    <th>Frekuensi</th>
                  </tr>
                </thead>
                <tbody>
            `;
            data.matchedKeywords.forEach(keyword => {
              resultsHtml += `
                <tr>
                  <td>${keyword.keyword}</td>
                  <td>${keyword.frequency}</td>
                </tr>
              `;
            });
            resultsHtml += `
                </tbody>
              </table>
            `;
            keywordResults.innerHTML = resultsHtml;
          } else {
            keywordResults.innerHTML = '<strong>Tidak ada kata kunci yang cocok.</strong>';
          }
        })
        .catch(error => {
          console.error('Error:', error);
          keywordResults.innerHTML = '<strong>Terjadi kesalahan saat memproses kata kunci.</strong>';
        });
    });
  });
</script>

@endsection
