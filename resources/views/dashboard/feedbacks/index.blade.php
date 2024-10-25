@extends('dashboard.layouts.main')

@section('title', 'Umpan Balik')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Umpan Balik Saya</h1>
</div>

{{-- pesan alert berhasil--}}
@if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('success') }}
    </div>
@endif

<div class="table-responsive col-lg-9 mb-3">

  {{-- create --}}
  @cannot('admin')
  <a href="/dashboard/feedbacks/create" class="btn btn-primary mb-3">
    Buat Umpan Balik Baru
  </a>
  @endcannot

  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col" style="text-align: center;">NO.</th>
        <th scope="col" style="text-align: center;">Nama</th>
        <th scope="col" style="text-align: center;">Produk</th>
        <th scope="col" style="text-align: center;">Pertanyaan</th>
        <th scope="col" style="text-align: center;">Jawaban</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($feedbacks as $feedback)
      <tr>
        <td style="text-align: center;">{{ $loop->iteration }}</td>
        <td>{{ $feedback->user->name ?? 'Tidak ada nama'}}</td>
        <td style="text-align: center;">{{ $feedback->produk->nama_produk ?? 'Tidak ada produk'}}</td>
        <td>{{ $feedback->pertanyaan->soal ?? 'Tidak ada pertanyaan'}}</td>
        <td>{{ $feedback->jawaban ?? 'Tidak ada jawaban'}}</td>
        <td>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection