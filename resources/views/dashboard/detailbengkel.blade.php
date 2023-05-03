@extends('layouts.dashboard.main')

@section('container')
    <div class="row my-3">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <h1 class="mb-3">{{ $bengkel->title }}</h1>

                    <a href="/databengkel" class="btn btn-success mb-3"><i class="fa-solid fa-arrow-left fa-xs"></i> Back to previous</a>
                    <a href="/bengkels/{{ $bengkel->id }}/edit" class="btn btn-warning mb-3"><i class="fa-solid fa-pen-to-square fa-xs"></i> Edit</a>
                    <form action="/bengkels/{{ $bengkel->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger mb-3"><i class="fa-solid fa-trash fa-xs"></i> Delete</button>
                    </form>

                    <img src="{{ asset('storage/' . $bengkel->image) }}" alt="" class="img-fluid col-lg-4 d-flex">
                    <h5 class="mt-3">{{ $bengkel->address }}</h5>
                    <h5>{{ $bengkel->description }}</h5>
                    <h5>{{ $bengkel->created_at->format('h F Y') }}</h5>
                    <h5>{{ $bengkel->jambuka->format('H:i') }} s/d {{ $bengkel->jamtutup->format('H:i') }}</h5>
                </div>
            </div>
        </div>
    </div>
@endsection