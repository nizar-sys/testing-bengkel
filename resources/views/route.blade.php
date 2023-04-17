@extends('layouts.main')

@section('container')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="d-flex justify-content-between mb-3">
                <div id="backTo">
                    <a href="/bengkels" class="btn btn-secondary"><i class="fa-solid fa-angle-left"></i> Back</a>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">Bengkel: {{ $bengkels->title }}</div>
                <div class="card-body">
                    <div style="height: 500px" id="mapContainer"></div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <p>Information :</p>
                    <img src="{{ asset('storage/' . $bengkels->image) }}" alt="" class="img-fluid">
                    <h4>{{ $bengkels->title }}</h4>
                    <span>{{ $bengkels->address }}</span>
                    <p>{{ $bengkels->description }}</p>
                    <div id="summary"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        window.action = "direction"
    </script>
@endpush