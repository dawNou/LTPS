@extends('dashboard.layouts.main')

@section('title', 'Kategori Blog')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Kategori Blog</h1>
</div>

{{-- pesan alert berhasil--}}
@if (session()->has('success'))
<div class="alert alert-success col-lg-7" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-7">

  {{-- create --}}
  {{-- tombol create --}}
  <a href="/dashboard/categories/create" class="btn btn-primary mb-3">
    Buat Kategori Baru
  </a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col" style="width: 5%; text-align: center;">NO.</th>
        <th scope="col" style="text-align: center;">Nama Kategori</th>
        <th scope="col" style="width: 30%; text-align: center;">Kata Kunci</th>
        <th scope="col" style="width: 12%; text-align: center;">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $category)
      <tr>
        <td style="text-align: center;">{{ $loop->iteration }}.</td>
        <td style="text-align: center;">{{ $category->name }}</td>
        <td>
          @if($category->keywords->isEmpty())
          <p style="color: red; font-weight:bold;">Kata kunci belum dipilih</p>
          @else
          <ul>
            @foreach($category->keywords as $keyword)
            <li>{{ $keyword->keyword }}</li>
            @endforeach
          </ul>
          @endif
        </td>
        <td>
          {{-- update --}}
          <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning">
            <i class="bi bi-pencil-square"></i>
          </a>

          {{-- delete --}}
          <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Apakah anda yakin?')">
              <i class="bi bi-x-circle"></i>
            </button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection