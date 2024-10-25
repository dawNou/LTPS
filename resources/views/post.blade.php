@extends('layouts.main')

@section('container')

<div class="container" style="padding-top:5%">
  <div class="row justify-content-center mb-5">
    <div class="col-md-8">
      <h1 class="mt-3 mb-3">{{ $post->title }}</h1>

      <h5>
        Oleh: {{ $post->author->name }} dengan Kategori: {{ $post->category->name }}
      </h5>

      <a href="/posts" class="text-decoration-none btn mb-3"
        style="background-color: #800020; color: white; border-color: #8B0000;">
        <<< Kembali ke Konten Blog</a>

      @if ($post->image)
      <div style="max-height: 350px; overflow:hidden;">
        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
      </div>
      @else
      <img src="" alt="{{ $post->category->name }}" class="img-fluid">
      @endif

      <article class="my-3 fs-5">
        {!! $post->body !!}
      </article>

      <a href="/posts" class="text-decoration-none btn mb-3"
        style="background-color: #800020; color: white; border-color: #8B0000;">
        <<< Kembali ke Konten Blog</a>

    </div>
  </div>
</div>

@endsection