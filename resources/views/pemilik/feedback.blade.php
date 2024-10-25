@extends('dashboard.layouts.main')

@section('title', 'Umpan Balik')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Umpan Balik Pelanggan</h1>
</div>

<a href="{{ url('pemilik-download-feedback-pdf') }}" target="_blank">
  <button class="btn btn-success">
    Export PDF
  </button>
</a>

<div class="table-responsive col-lg-9">
  @foreach ($feedbacks as $userId => $userFeedbacks)
  <h3>Umpan Balik dari: {{ $userFeedbacks->first()->user->name }}</h3>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">NO.</th>
        <th scope="col">Produk</th>
        <th scope="col">Pertanyaan</th>
        <th scope="col">Jawaban</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($userFeedbacks as $feedback)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $feedback->produk->nama_produk }}</td>
        <td>{{ $feedback->pertanyaan->soal }}</td>
        <td>{{ $feedback->jawaban }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <hr>
  @endforeach
</div>

@endsection