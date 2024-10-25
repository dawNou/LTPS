<!-- resources/views/admin/users.blade.php -->
@extends('dashboard.layouts.main')

@section('title', 'Kelola Pengguna')

@section('container')
<div class="container" style="padding-top: 30px">
    <h2>Daftar Pengguna</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 50px; text-align: center;">NO.</th>
                <th style="text-align: center;">Nama</th>
                <th style="text-align: center;">Email</th>
                <th style="text-align: center;">Status Admin</th>
                <th style="width: 200px; text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td style="text-align: center;">{{ $loop->iteration }}.</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td style="text-align: center;">{{ $user->is_admin ? 'Admin' : 'Pengguna' }}</td>
                    <td style="text-align: center;">
                        @if($user->is_admin)
                            {{-- <form action="{{ url('/dashboard/keloladmin/hapus/' . $user->user_id) }}" method="post" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-warning">Nonaktifkan Admin</button>
                            </form> --}}
                            <form action="{{ url('/dashboard/keloladmin/hapus/' . $user->id) }}" method="post" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-warning">Nonaktifkan Admin</button>
                            </form>
                        @else
                            {{-- <form action="{{ url('/dashboard/keloladmins/tambah/' . $user->user_id) }}" method="post" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success">Tambah Admin</button>
                            </form> --}}
                            <form action="{{ url('/dashboard/keloladmins/tambah/' . $user->id) }}" method="post" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success">Tambah Admin</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
