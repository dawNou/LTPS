@extends('dashboard.layouts.main')

@section('title', 'Kata Kunci')

@section('container')

{{-- pesan alert berhasil --}}
@if (session()->has('success'))
<div class="alert alert-success col-lg-8" style="margin-top: 20px" role="alert">
    {{ session('success') }}
</div>
@endif

{{-- pesan alert gagal --}}
@if (session()->has('error'))
<div class="alert alert-danger col-lg-8" role="alert">
    {{ session('error') }}
</div>
@endif

<small style="font-weight: bold; color: red; display: block; margin-top: 15px;">*Proses ekstraksi data umpan balik</small>

<form action="{{ route('feedback.proses') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-success mb-3">Proses Kata Kunci</button>
</form>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" style="font-weight: bold;">Daftar Kata Kunci</h1>
</div>

<div class="container">
    <div class="grid-container" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1rem;">
        @foreach ($chunks as $chunk)
            <div class="grid-item">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 70%; text-align: center;">Daftar Kata Kunci</th>
                            <th scope="col" style="width: 20%; text-align: center;">Frekuensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chunk as $keyword)
                        <tr>
                            <td style="text-align: center;">{{ $keyword->keyword }}</td>
                            <td style="text-align: center;">{{ $keyword->frequency }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
</div>

@endsection
