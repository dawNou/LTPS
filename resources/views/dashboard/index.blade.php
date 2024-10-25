@extends('dashboard.layouts.main')

@section('title', 'Dashboard')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Selamat Datang, {{ auth()->user()->name }}</h1>
</div>

@can('admin')

<div class="row">

  {{-- Umpan Balik--}}
  <div class="col-md-4">
    <div class="card text-white mb-3" style="background-color: #40534C">
      <div class="card-header">Jumlah Umpan Balik</div>
      <div class="card-body">
        <h5 class="card-title">{{ $feedbackCount }}</h5>
        <a href="/dashboard/adminfeedbacks" class="btn btn-light">Selengkapnya >></a>
      </div>
    </div>
  </div>

  {{-- Kata Kunci --}}
  <div class="col-md-4">
    <div class="card text-white mb-3" style="background-color: #A0153E">
      <div class="card-header">Jumlah Kata Kunci</div>
      <div class="card-body">
        <h5 class="card-title">{{ $keywordCount }}</h5>
        <a href="/dashboard/keywords" class="btn btn-light">Selengkapnya >></a>
      </div>
    </div>
  </div>

  {{-- Kategori Blog --}}
  <div class="col-md-4">
    <div class="card text-white mb-3" style="background-color: #524C42">
      <div class="card-header">Jumlah Kategori Blog</div>
      <div class="card-body">
        <h5 class="card-title">{{ $katblogCount }}</h5>
        <a href="/dashboard/categories" class="btn btn-light">Selengkapnya >></a>
      </div>
    </div>
  </div>

  {{-- Konten Blog --}}
  <div class="col-md-4">
    <div class="card text-white mb-3" style="background-color: #1F6E8C">
      <div class="card-header">Jumlah Konten Blog</div>
      <div class="card-body">
        <h5 class="card-title">{{ $kontenblogCount }}</h5>
        <a href="/dashboard/posts" class="btn btn-light">Selengkapnya >></a>
      </div>
    </div>
  </div>

  {{-- Produk --}}
  <div class="col-md-4">
    <div class="card text-white mb-3" style="background-color: #D21312">
      <div class="card-header">Jumlah Produk</div>
      <div class="card-body">
        <h5 class="card-title">{{ $produkCount }}</h5>
        <a href="/dashboard/produks" class="btn btn-light">Selengkapnya >></a>
      </div>
    </div>
  </div>

  {{-- Kategori Produk --}}
  <div class="col-md-4">
    <div class="card text-white mb-3" style="background-color: #735F32">
      <div class="card-header">Jumlah Kategori Produk</div>
      <div class="card-body">
        <h5 class="card-title">{{ $katprodCount }}</h5>
        <a href="/dashboard/katprods" class="btn btn-light">Selengkapnya >></a>
      </div>
    </div>
  </div>

  {{-- Pertanyaan --}}
  <div class="col-md-4">
    <div class="card text-white mb-3" style="background-color: #A27B5C">
      <div class="card-header">Jumlah Pertanyaan</div>
      <div class="card-body">
        <h5 class="card-title">{{ $pertanyaanCount }}</h5>
        <a href="/dashboard/pertanyaans" class="btn btn-light">Selengkapnya >></a>
      </div>
    </div>
  </div>
  @endcan

  @endsection