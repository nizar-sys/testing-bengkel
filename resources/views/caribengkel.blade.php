@extends('layouts.main')

@section('container')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="d-flex justify-content-between mb-3">
                <div id="create-bengkel">
                    <a href="/bengkels/create" class="btn btn-primary">Create!</a>
                </div>
                <div id="view-bengkel">
                    <a href="/bengkels" class="btn btn-secondary">List</a>
                    <a href="/browse/bengkels" class="btn btn-secondary">Globe</a>
                </div>
            </div>

            @foreach ($bengkels as $bengkel)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $bengkel->title }}
                        <form action="#" method="DELETE">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            <a href="#" class="btn btn-sm btn-info text-white">Edit</a>
                        </form>
                    </h5>
                    <h6 class="card-subtitle">{{ $bengkel->address }}</h6>
                    <p class="card-text">{{ $bengkel->description }}</p>
                    <a href="#" class="card-link">Direction</a>
                </div>
            </div>   
            @endforeach
        </div>
    </div>
@endsection