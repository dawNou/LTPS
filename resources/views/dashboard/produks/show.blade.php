@extends('dashboard.layouts.main')

@section('title', 'Tinjau Produk')

@section('container')
<div class="container">
  <div class="row my-3">
    <div class="col-lg-8">
      <h1 class="mb-3">{{ $produk->nama_produk }}</h1>
      <h3 class="mb-3">Kategori: {{ $produk->katprod->namakatprod}}</h3>
      <h3 class="mb-3">Harga: Rp {{ $produk->harga_produk}}</h3>

      <a href="/dashboard/produks" class="btn btn-success"><i class="bi bi-arrow-bar-left"></i> 
        Kembali
      </a>

      {{-- edit --}}
      <a href="/dashboard/produks/{{ $produk->slug }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i> 
        Edit
      </a>

      {{-- delete --}}
      <form action="/dashboard/produks/{{ $produk->slug }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger" onclick="return confirm('Are your sure?')">
          <i class="bi bi-x-circle"></i> 
          Delete
        </button>
      </form>

      {{-- buat nampilin image --}}
      @if ($produk->image)
      <div style="max-height: 350px; overflow:hidden;">
        <img src="{{ asset('storage/' . $produk->image) }}" alt="{{ $produk->katprod->namakatprod }}" class="img-fluid mt-3">
      </div>
      @else
        <img src="" alt="" class="img-fluid mt-3">
      @endif

      <article class="my-3 fs-5">
        {!! $produk->body !!}
      </article>

      <a href="/dashboard/produks" class="btn btn-success"><i class="bi bi-arrow-bar-left"></i> 
        Kembali
      </a>

    </div>
  </div>
</div>
@endsection