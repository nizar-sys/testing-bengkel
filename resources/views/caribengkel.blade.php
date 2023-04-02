@extends('layouts.main')

@section('container')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="d-flex justify-content-between mb-3">
                <div id="create-bengkel">
                    <a href="/bengkels/create" class="btn btn-primary">Create!</a>
                </div>
                <div id="view-bengkel">
                    <a href="#" class="btn btn-secondary">List</a>
                    <a href="#" class="btn btn-secondary">Globe</a>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Bengkel</div>
                <div class="card-body">
                    List of bengkel!
                </div>
            </div>
        </div>
    </div>
@endsection