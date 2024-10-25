@extends('dashboard.layouts.main')

@section('title', 'Konten Blog')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Konten Blog</h1>
</div>

{{-- pesan alert berhasil--}}
@if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('success') }}
    </div>
@endif

<div class="table-responsive col-lg-9">

  <div class="d-flex justify-content-start mb-3">
    <a href="/dashboard/posts/create" class="btn btn-primary mr-3">
      Buat Konten Blog Baru
    </a>
  
    <a href="{{ url('admin-download-post-pdf') }}" target="_blank">
      <button class="btn btn-success"  style="margin-left: 20px;">
        Export PDF
      </button>
    </a>
  </div>
  
  
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col" style="width: 5%; text-align: center;">NO.</th>
        <th scope="col" style="text-align: center;">Judul</th>
        <th scope="col" style="text-align: center;">Kategori Blog</th>
        <th scope="col" style="text-align: center;">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
      <tr>
        <td style="text-align: center;">{{ $loop->iteration }}.</td>
        <td>{{ $post->title }}</td>
        <td style="text-align: center;">{{ $post->category->name ?? 'Tidak ada kategori'}}</td>
        <td style="text-align: center;">

          {{-- read --}}
          <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><i class="bi bi-eye"></i>
          </a>

          {{-- update --}}
          <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning">
            <i class="bi bi-pencil-square"></i>
          </a>

          {{-- delete --}}
          <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
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