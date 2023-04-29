@extends('layouts.dashboard.main')

@section('container')
    <div class="row my-3">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <h1 class="mb-3">{{ $user->title }}</h1>

                    <a href="/users" class="btn btn-success mb-3"><i class="fa-solid fa-arrow-left fa-xs"></i> Back to previous</a>
                    <a href="/users/{{ $user->id }}/edit" class="btn btn-warning mb-3"><i class="fa-solid fa-pen-to-square fa-xs"></i> Edit</a>
                    <form action="/users/{{ $user->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger mb-3"><i class="fa-solid fa-trash fa-xs"></i> Delete</button>
                    </form>
                    <h5 class="mt-3">{{ $user->name }}</h5>
                    <h5>{{ $user->username }}</h5>
                    <h5>{{ $user->email }}</h5>
                    <h5>{{ $user->roles }}</h5>
                    <h5>{{ $user->created_at->format('h F Y') }}</h5>
                </div>
            </div>
        </div>
    </div>
@endsection