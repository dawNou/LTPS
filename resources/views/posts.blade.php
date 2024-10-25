@extends('layouts.main')

@section('container')

<h1 class="mb-3 text-center" style="padding-top: 80px">{{ $title }}</h1>

<div class="mb-4 text-center">
  <!-- Tombol Semua -->
  <a href="/posts" 
     class="btn m-1" 
     style="{{ request('category') ? 'background-color: white; color: #8B0000; border-color: #8B0000;' : 'background-color: #8B0000; color: white; border-color: #8B0000;' }}">
      Semua
  </a>

  <!-- Kategori Utama -->
  @foreach ($mainCategories as $category)
      <a href="/posts?category={{ $category->slug }}" 
         class="btn m-1" 
         style="{{ request('category') == $category->slug ? 'background-color: #8B0000; color: white; border-color: #8B0000;' : 'background-color: white; color: #8B0000; border-color: #8B0000;' }}">
          {{ $category->name }}
      </a>
  @endforeach

  <!-- Dropdown Kategori Lainnya -->
  @if ($additionalCategories->count() > 0)
      <div class="btn-group">
          <button type="button" class="btn dropdown-toggle" 
                  style="background-color: #8B0000; color: white; border-color: #8B0000;" 
                  data-bs-toggle="dropdown" aria-expanded="false">
              Lainnya
          </button>
          <ul class="dropdown-menu" 
              style="background-color: #8B0000; color: white; max-height: 300px; overflow-y: auto;">
              @foreach ($additionalCategories as $category)
                  <li><a class="dropdown-item" 
                         href="/posts?category={{ $category->slug }}" 
                         style="color: white; background-color: transparent;" 
                         onmouseover="this.style.backgroundColor='#800020';" 
                         onmouseout="this.style.backgroundColor='transparent';">
                         {{ $category->name }}
                  </a></li>
              @endforeach
          </ul>
      </div>
  @endif
</div>

<div class="row justify-content-center mb-3">
  <div class="col-md-6">
    <form action="/posts">
      @if (request('category'))
      <input type="hidden" name="category" value="{{ request('category') }}">
      @endif
      @if (request('author'))
      <input type="hidden" name="author" value="{{ request('author') }}">
      @endif
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari..." name="search" value="{{ request('search') }}">
        <button class="btn" style="background-color: #800020; color: white; border-color: #8B0000;" type="submit">Cari</button>
      </div>
    </form>
  </div>
</div>

@if ($posts->count())
<div class="card mb-3" style="background-color: #F6F5F2">

  @if ($posts[0]->image)
  <div style="display: flex; justify-content: center; align-items: center; max-height: 400px; overflow:hidden;">
    <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}" class="img-fluid">
  </div>
  @else
  <img src="" alt="{{ $posts[0]->category->name }}" class="img-fluid mt-3">
  @endif

  <div class="card-body text-center">
    <h3 class="card-title">
      <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{
        $posts[0]->title }}
      </a>
    </h3>
    <p>
      <small class="text-muted">
        Oleh
        <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none" style="color: #8B0000;">{{
          $posts[0]->author->name }}
        </a>
        dengan Kategori
        <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none" style="color: #8B0000;">{{
          $posts[0]->category->name }}
        </a> {{ $posts[0]->created_at->diffForHumans() }}
      </small>
    </p>

    <p class="card-text">
      {{ $posts[0]->excerpt }}
    </p>

    <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary" style="background-color: #800020; color: white; border-color: #8B0000;">
      Selengkapnya >>>
    </a>

  </div>
</div>

<div class="container">
  <div class="row">
    @foreach ($posts->skip(1) as $post)
    <div class="col-md-4 mb-3 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="position-absolute px-3 py-2" style="background-color: #800020">
          <a href="/posts?category={{ $post->category->slug }}" class=" text-white text-decoration-none">{{
            $post->category->name }}
          </a>
        </div>

        @if ($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="card-img-top img-fluid" style="object-fit: cover; height: 350px;">
        @else
        <img src="..." class="card-img-top img-fluid" alt="{{ $post->category->name }}" style="object-fit: cover; height: 200px;">
        @endif

        <div class="card-body d-flex flex-column">
          <h5 class="card-title">{{ $post->title }}</h5>
          <p>
            <small class="text-muted">
              Oleh <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none" style="color: #8B0000;">{{
                $post->author->name }}</a> {{ $post->created_at->diffForHumans() }}
            </small>
          </p>
          <p class="card-text flex-grow-1">{{ $post->excerpt }}</p>
          <a href="/posts/{{ $post->slug }}" class="btn btn-primary mt-auto" style="background-color: #800020; color: white; border-color: #8B0000;">Selengkapnya >>></a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@else
<p class="text-center fs-4">Belum Terdapat Konten Blog</p>
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
  {{ $posts->links() }}
</div>

@endsection