@extends('layouts.dashboard.main')

@section('container')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard" style="text-decoration: none">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Bengkel</li>
        </ol>
    </nav>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <a href="#" class="btn btn-primary"><i class="fa-solid fa-plus fa-xs"></i> Tambah data</a>
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
            <?php $i = 1; ?>
            @foreach ($bengkels as $bengkel)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $bengkel->title }}</td>
                <td>{{ $bengkel->address }}</td>
                <td>{{ $bengkel->description }}</td>
                <td>{{ $bengkel->latitude }}</td>
                <td>{{ $bengkel->longitude }}</td>
                <td>{{ $bengkel->created_at->format('h F Y') }}</td>
                <td>
                    <a class="btn btn-success" href="#"><i class="fa-solid fa-eye"></i></a>
                    <a class="btn btn-warning" href="#"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a class="btn btn-danger" href="#"><i class="fa-solid fa-trash-can"></i></a>
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
    </table>
@endsection