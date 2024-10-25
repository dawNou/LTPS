@extends('dashboard.layouts.main')

@section('title', 'Daftar Pertanyaan')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Daftar Pertanyaan</h1>
</div>

{{-- pesan alert berhasil--}}
@if (session()->has('success'))
    <div class="alert alert-success col-lg-7" role="alert">
      {{ session('success') }}
    </div>
@endif

<div class="table-responsive col-lg-10">

  {{-- create --}}
  {{-- tombol create --}}
  <a href="/dashboard/pertanyaans/create" class="btn btn-primary mb-3">
    Buat Pertanyaan Baru
  </a>
  <table class="table table-striped table-sm mb-3">
    <thead>
      <tr>
        <th scope="col" style="width: 5%; text-align: center;">NO.</th>
        <th scope="col" style="text-align: center;">Daftar Pertanyaan</th>
        <th scope="col" style="width: 15%; text-align: center;">Kategori Produk</th>
        <th scope="col" style="width: 10%; text-align: center;">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($pertanyaans as $pertanyaan)
      <tr>
        <td style="text-align: center;">{{ $loop->iteration }}.</td>
        <td>{{ $pertanyaan->soal }}</td>
        <td style="text-align: center;">{{ $pertanyaan->katprod->namakatprod ?? 'Tidak ada kategori'}}</td>
        <td style="text-align: center;">

          {{-- update --}}
          <a href="/dashboard/pertanyaans/{{ $pertanyaan->slug }}/edit" class="badge bg-warning">
            <i class="bi bi-pencil-square"></i>
          </a>

          {{-- delete --}}
          <form action="/dashboard/pertanyaans/{{ $pertanyaan->slug }}" method="post" class="d-inline">
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