@extends('dashboard.layouts.main')

@section('title', 'Tinjau Konten')

@section('container')
<div class="container">
  <div class="row my-3">
    <div class="col-lg-8">
      <h1 class="mb-3">{{ $post->title }}</h1>

      <a href="/dashboard/posts" class="btn btn-success"><i class="bi bi-arrow-bar-left"></i> 
        Kembali ke Konten Blog
      </a>

      {{-- edit --}}
      <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i> 
        Edit
      </a>

      {{-- delete --}}
      <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger" onclick="return confirm('Are your sure?')">
          <i class="bi bi-x-circle"></i> 
          Delete
        </button>
      </form>

      {{-- buat nampilin image --}}
      @if ($post->image)
      <div style="max-height: 350px; overflow:hidden;">
        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
      </div>
      @else
        {{-- <img src="" alt="{{ $post->category->name }}" class="img-fluid mt-3"> --}}
        <img src="" alt="" class="img-fluid mt-3">
      @endif

      <article class="my-3 fs-5">
        {!! $post->body !!}
      </article>

      <a href="/dashboard/posts" class="btn btn-success"><i class="bi bi-arrow-bar-left"></i> 
        Kembali
      </a>

    </div>
  </div>
</div>
@endsection