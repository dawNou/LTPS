@extends('layouts.main')

@section('container')

<div class="container" style="padding-top:5%">
  <div class="row justify-content-center mb-5">
    <div class="col-md-8">
      <h1 class="mb-3">{{ $produk->nama_produk }}</h1>

      <h5>
        Kategori: {{ $produk->katprod->namakatprod }}
      </h5>

      <h5>
        Harga: Rp {{ number_format($produk->harga_produk, 0, ',', '.') }}
      </h5>

      <a href="/produks" class="text-decoration-none btn mb-3"
        style="background-color: #800020; color: white; border-color: #8B0000;">
        <<< Kembali Ke Katalog Produk </a>

          @if ($produk->image)
          <div style="max-height: 350px; overflow:hidden;">
            <img src="{{ asset('storage/' . $produk->image) }}" alt="{{ $produk->katprod->namakatprod }}"
              class="img-fluid">
          </div>
          @else
          <img src="" alt="{{ $produk->katprod->namakatprod }}" class="img-fluid">
          @endif

          <article class="my-3 fs-5">
            {!! $produk->body !!}
          </article>

          <a href="/produks" class="text-decoration-none btn mb-3"
            style="background-color: #800020; color: white; border-color: #8B0000;">
            <<< Kembali Ke Katalog Produk </a>

    </div>
  </div>
</div>

@endsection