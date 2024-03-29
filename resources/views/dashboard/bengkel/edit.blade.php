@extends('layouts.dashboard.main')

@section('container')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="d-flex justify-content-between mb-3">
                <div id="backTo">
                    <a href="/databengkel" class="btn btn-secondary"><i class="fa-solid fa-angle-left"></i> Back</a>
                </div>
            </div>
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">Create new data bengkel!</div>
                <div class="card-body">
                    <form action="/bengkels/{{ $bengkels->id }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title', $bengkels->title) }}" required autofocus>
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" rows="5" required>{{ $bengkels->address }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="5" required>{{ $bengkels->description }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div id="here-maps mb-3">
                            <label for="">Pin Location</label>
                            <div style="height: 500px" id="mapContainer"></div>
                        </div>
                        <div class="mb-3">
                            <label for="latitude" class="form-label">Latitude</label>
                            <input type="text" class="form-control @error('latitude') is-invalid @enderror" name="latitude" id="latitude" value="{{ old('latitude', $bengkels->latitude) }}" required>
                            @error('latitude')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input type="text" class="form-control @error('longitude') is-invalid @enderror" name="longitude" id="longitude" value="{{ old('longitude', $bengkels->longitude) }}" required>
                            @error('longitude')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jambuka" class="form-label">Jam Buka</label>
                            <input type="time" class="form-control @error('jambuka') is-invalid @enderror" name="jambuka" id="jambuka" onchange="myFunction()" >
                            {{-- <button onclick="myFunction()">Try it</button> --}}
                            <p id="demo"></p>
                            @error('jambuka')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jamtutup" class="form-label">Jam Tutup</label>
                            <input type="time" class="form-control @error('jamtutup') is-invalid @enderror" name="jamtutup" id="jamtutup" onchange="myFunction()" >
                            <p id="demo1"></p>
                            @error('jamtutup')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Bengkel Photo</label>
                            <input type="hidden" name="oldImage" value="{{ $bengkels->image }}">
                            @if ($bengkels->image)
                                <img src="{{ asset('storage/' . $bengkels->image) }}" class="img-preview img-fluid mb-3 col-sm-2 d-block">
                            @else
                                <img class="img-preview img-fluid mb-3 col-sm-2">
                            @endif   
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        window.action = "submit"

        function myFunction() {
	        var x = document.getElementById("jambuka").value;
	        document.getElementById("demo").innerHTML = x;
            var y = document.getElementById("jamtutup").value;
            document.getElementById("demo1").innerHTML = y;
	    }


        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endpush