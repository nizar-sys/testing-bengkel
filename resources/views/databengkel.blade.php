@extends('layouts.main')

@section('container')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/" style="text-decoration: none">SIBENG</a></li>
        <li class="breadcrumb-item active">Data Bengkel</li>
        </ol>
    </nav>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Bengkel</h1>
        {{-- <a href="/bengkel/cetakpdf" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>     
    @endif

    <div class="col-md-4">
        <form action="/bengkel/databengkel" class="d-inline">
            <div class="input-group col-lg-3 float-right">   
                <input type="text" class="form-control bg-light small" placeholder="Search ..." name="search" value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>

    </div>

    <table class="table table-bordered mt-2">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama Bengkel</th>
            <th scope="col">Address</th>
            <th scope="col">Description</th>
            <th scope="col">Latitude</th>
            <th scope="col">Longitude</th>
            <th scope="col">Rute</th>
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
                <td><a href="#" onclick="openDirection({{ $bengkel->latitude }}, {{ $bengkel->longitude }}, {{ $bengkel->id }})" class="card-link">Direction</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $bengkels->links() }} 
    </div>
@endsection