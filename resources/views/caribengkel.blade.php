@extends('layouts.main')

@section('container')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="d-flex justify-content-between mb-3">
                {{-- <div id="create-bengkel">
                    <a href="/bengkels/create" class="btn btn-primary">Create!</a>
                </div> --}}
                <a href="/bengkel/databengkel" class="btn btn-primary">Table</a>
                <a href="#" class="btn btn-primary" id="terdekat">Terdekat</a>
                <div id="view-bengkel">
                    
                    <a href="/bengkels" class="btn btn-secondary">List</a>
                    <a href="/browse/bengkels" class="btn btn-secondary">Globe</a>
                </div>
            </div>

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($bengkels->count() == 0)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Data bengkel belum tersedia!
                        </h5>
                    </div>
                </div>
            @else
                @foreach ($bengkels as $bengkel)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $bengkel->title }}
                                {{-- <form action="/bengkels/{{ $bengkel->id }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure ?')">Delete</button>
                                    <input type="hidden" name="image" value="{{ $bengkel->image }}">
                                    <a href="/bengkels/{{ $bengkel->id }}/edit" class="btn btn-sm btn-info text-white">Edit</a>
                                </form> --}}
                            </h5>
                            <h6 class="card-subtitle">{{ $bengkel->address }}</h6>
                            <p class="card-text">{{ $bengkel->description }}</p>
                            <a href="#" onclick="openDirection({{ $bengkel->latitude }}, {{ $bengkel->longitude }}, {{ $bengkel->id }})" class="card-link">Direction</a>
                        </div>
                    </div>              
                @endforeach
            @endif

            
        </div>
    </div>
@endsection