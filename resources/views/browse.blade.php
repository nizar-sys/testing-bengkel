@extends('layouts.main')

@section('container')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="d-flex justify-content-between mb-3">
                <div id="view-bengkel">
                    <a href="/bengkels" class="btn btn-secondary">List</a>
                    <a href="#" class="btn btn-secondary">Globe</a>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Lokasi seluruh bengkel!</div>
                <div class="card-body">
                    <div style="height: 500px" id="mapContainer"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        window.action = "browse"
    </script>
@endpush