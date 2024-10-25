@extends('dashboard.layouts.main')

@section('title', 'Daftar Konten Blog')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Daftar Konten Blog</h1>
</div>

<a href="{{ url('pemilik-download-post-pdf') }}" target="_blank">
  <button class="btn btn-success">
    Export PDF
  </button>
</a>

<div class="table-responsive col-lg-9">
  @foreach ($posts as $userId => $userPosts)
  <h3>Konten Blog oleh: {{ $userPosts->first()->author->name }}</h3>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">NO.</th>
        <th scope="col">Judul</th>
        <th scope="col">Excerpt</th>
        {{-- <th scope="col">Tanggal Dibuat</th> --}}
      </tr>
    </thead>
    <tbody>
      @foreach ($userPosts as $post)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->excerpt }}</td>
        {{-- <td>{{ $blog->created_at }}</td> --}}
      </tr>
      @endforeach
    </tbody>
  </table>
  <hr>
  @endforeach
</div>
@endsection
