@extends('layouts.dashboard.main')

@section('container')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard" style="text-decoration: none">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Users</li>
        </ol>
    </nav>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Users</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>     
    @endif

    <a href="/users/create" class="btn btn-primary"><i class="fa-solid fa-plus fa-xs"></i> Tambah data</a>
        <form action="/users" class="d-inline">
            <div class="input-group col-lg-3 float-right">   
                <input type="text" class="form-control bg-light small" placeholder="Search ..." name="search" value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    <table class="table table-bordered mt-2">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Name</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">roles</th>
            <th scope="col">Tanggal dibuat</th>
            <th scope="col">Update</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ (($users->currentPage() - 1 ) * $users->perPage() ) + $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->roles }}</td>
                <td>{{ $user->created_at->format('h F Y') }}</td>
                <td>{{ $user->updated_at->diffForHumans() }}</td>
                <td>
                    <a class="btn btn-success" href="/users/{{ $user->id }}"><i class="fa-solid fa-eye"></i></a>
                    <a class="btn btn-warning" href="/users/{{ $user->id }}/edit"><i class="fa-solid fa-pen-to-square"></i></a>
                    <form action="/users/{{ $user->id }}" method="post" class="d-inline">
                         @method('delete')
                         @csrf
                            <button type="submit" class="btn btn-danger me-auto" onclick="return confirm('Are you sure ?')"><i class="fa-solid fa-trash-can"></i></button>
                            {{-- <input type="hidden" name="image" value="{{ $users->image }}"> --}}
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $users->links() }} 
    </div>
@endsection