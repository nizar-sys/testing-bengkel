@extends('layouts.dashboard.main')

@section('container')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard" style="text-decoration: none">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Bengkel</li>
        </ol>
    </nav>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Bengkel</h1>
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
    <a href="/bengkels/create" class="btn btn-primary"><i class="fa-solid fa-plus fa-xs"></i> Tambah data</a>
    <table class="table table-bordered mt-2">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Title</th>
            <th scope="col">Address</th>
            <th scope="col">Description</th>
            <th scope="col">Latitude</th>
            <th scope="col">Longitude</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($bengkels as $bengkel)
            <tr>
                <td>{{ (($bengkels->currentPage() - 1 ) * $bengkels->perPage() ) + $loop->iteration }}</td>
                <td>{{ $bengkel->title }}</td>
                <td>{{ $bengkel->address }}</td>
                <td>{{ $bengkel->description }}</td>
                <td>{{ $bengkel->latitude }}</td>
                <td>{{ $bengkel->longitude }}</td>
                <td>{{ $bengkel->created_at->format('h F Y') }}</td>
                <td>
                    <a class="btn btn-success" href="/dashboard/{{ $bengkel->id }}"><i class="fa-solid fa-eye"></i></a>
                    <a class="btn btn-warning" href="/bengkels/{{ $bengkel->id }}/edit"><i class="fa-solid fa-pen-to-square"></i></a>
                    <form action="/bengkels/{{ $bengkel->id }}" method="post" class="d-inline">
                         @method('delete')
                         @csrf
                            <button type="submit" class="btn btn-danger me-auto" onclick="return confirm('Are you sure ?')"><i class="fa-solid fa-trash-can"></i></button>
                            <input type="hidden" name="image" value="{{ $bengkel->image }}">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $bengkels->links() }} 
    </div>
@endsection