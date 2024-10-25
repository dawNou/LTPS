@extends('layouts.main')

@section('container')

<h1 class="mb-3 text-center" style="padding-top: 80px">{{ $title }}</h1>

<h5 class="mb-3 text-center">
    Temukan kualitas terbaik dengan produk unggulan kami yang dirancang untuk memenuhi kebutuhan anda
</h5>

<div class="mb-4 text-center">
    <!-- Tombol Semua -->
    <a href="/produks" class="btn m-1"
        style="{{ request('katprod') ? 'background-color: white; color: #8B0000; border-color: #8B0000;' : 'background-color: #8B0000; color: white; border-color: #8B0000;' }}">
        Semua
    </a>

    <!-- Kategori Utama -->
    @foreach ($mainCategories as $katprod)
    <a href="/produks?katprod={{ $katprod->slug }}" class="btn m-1"
        style="{{ request('katprod') == $katprod->slug ? 'background-color: #8B0000; color: white; border-color: #8B0000;' : 'background-color: white; color: #8B0000; border-color: #8B0000;' }}">
        {{ $katprod->namakatprod }}
    </a>
    @endforeach

    <!-- Dropdown Lainnya -->
    @if ($additionalCategories->count() > 0)
    <div class="btn-group">
        <button type="button" class="btn dropdown-toggle"
            style="background-color: #8B0000; color: white; border-color: #8B0000;" data-bs-toggle="dropdown"
            aria-expanded="false">
            Lainnya
        </button>
        <ul class="dropdown-menu" style="max-height: 300px; overflow-y: auto; background-color: #8B0000; color: white;">
            @foreach ($additionalCategories as $katprod)
            <li><a class="dropdown-item" href="/produks?katprod={{ $katprod->slug }}"
                    style="color: white; background-color: transparent;"
                    onmouseover="this.style.backgroundColor='#800020';"
                    onmouseout="this.style.backgroundColor='transparent';">{{ $katprod->namakatprod }}</a></li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="/produks">
            @if (request('katprod'))
            <input type="hidden" name="katprod" value="{{ request('katprod') }}">
            @endif
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari..." name="search"
                    value="{{ request('search') }}">
                <button class="btn" style="background-color: #800020; color: white; border-color: #8B0000;"
                    type="submit">Cari</button>
            </div>
        </form>
    </div>
</div>

@if ($produks->count())
<div class="card mb-3" style="background-color: #F6F5F2">

    @if ($produks[0]->image)
    <div style="display: flex; justify-content: center; align-items: center; max-height: 400px; overflow:hidden;">
        <img src="{{ asset('storage/' . $produks[0]->image) }}" alt="{{ $produks[0]->katprod->namakatprod }}"
            class="img-fluid">
    </div>
    @else
    <img src="" alt="{{ $produks[0]->katprod->namakatprod }}" class="img-fluid mt-3">
    @endif

    <div class="card-body text-center">
        <h1 class="card-title">
            <a href="/produks/{{ $produks[0]->slug }}" class="text-decoration-none text-dark">{{
                $produks[0]->nama_produk }}
            </a>
        </h1>
        <h5>
            <small class="text-muted">
                Kategori
                <a href="/produks?katprod={{ $produks[0]->katprod->slug }}" class="text-decoration-none"
                    style="color: #8B0000;">
                    {{ $produks[0]->katprod->namakatprod }}
                </a>
            </small>
        </h5>

        <h5>
            Rp {{ number_format($produks[0]->harga_produk, 0, ',', '.') }}
        </h5>

        <p class="card-text">
            {{ $produks[0]->excerpt }}
        </p>

        <a href="/produks/{{ $produks[0]->slug }}" class="text-decoration-none btn btn-primary"
            style="background-color: #800020; color: white; border-color: #8B0000;">
            Selengkapnya >>>
        </a>
    </div>
</div>

<div class="container">
    <div class="row">
        @foreach ($produks->skip(1) as $produk)
        <div class="col-md-4 mb-3 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="position-absolute px-3 py-2" style="background-color: #800020">
                    <a href="/produks?katprod={{ $produk->katprod->slug }}" class=" text-white text-decoration-none">{{
                        $produk->katprod->namakatprod }}
                    </a>
                </div>

                @if ($produk->image)
                <img src="{{ asset('storage/' . $produk->image) }}" alt="{{ $produk->katprod->namakatprod }}"
                    class="card-img-top img-fluid" style="object-fit: cover; height: 350px;">
                @else
                <img src="..." class="card-img-top img-fluid" alt="{{ $produk->katprod->namakatprod }}"
                    style="object-fit: cover; height: 200px;">
                @endif

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">
                        {{ $produk->nama_produk }}
                    </h5>
                    <h5>
                        Rp {{ number_format($produk->harga_produk, 0, ',', '.') }}
                    </h5>
                    <p></p>
                    <p class="card-text flex-grow-1">
                        {{ $produk->excerpt }}
                    </p>
                    <a href="/produks/{{ $produk->slug }}" class="btn btn-primary mt-auto"
                        style="background-color: #800020; color: white; border-color: #8B0000;">
                        Selengkapnya >>>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@else
<p class="text-center fs-4">Belum Terdapat Produk</p>
@endif

<div class="d-flex justify-content-center">
    <style>
        .pagination a {
            color: #800020 !important; 
        }
        .pagination .page-item.active .page-link {
            background-color: #800020 !important; 
            color: #fff !important; 
        }
        .pagination .page-link {
            border-color: #800020 !important; 
        }
    </style>
    {{ $produks->links() }}
</div>


@endsection