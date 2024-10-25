@extends('dashboard.layouts.main')

@section('title', 'Kategori Produk')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">
    Kategori Produk
  </h1>
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
  <a href="/dashboard/katprods/create" class="btn btn-primary mb-3">
    Buat Kategori Produk Baru
  </a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col" style="width: 5%; text-align: center;">NO.</th>
        <th scope="col" style="text-align: center;">Nama Kategori Produk</th>
        <th scope="col" style="text-align: center;">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($katprods as $katprod)
      <tr>
        <td style="text-align: center;">{{ $loop->iteration }}.</td>
        <td style="text-align: center;">{{ $katprod->namakatprod }}</td>
        <td style="text-align: center;">

          {{-- update --}}
          <a href="/dashboard/katprods/{{ $katprod->slug }}/edit" class="badge bg-warning">
            <i class="bi bi-pencil-square"></i>
          </a>

          {{-- delete --}}
          <form action="/dashboard/katprods/{{ $katprod->slug }}" method="post" class="d-inline">
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