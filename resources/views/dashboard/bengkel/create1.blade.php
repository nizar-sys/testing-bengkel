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
                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">Create new data bengkel!</div>
                <div class="card-body">
                    <form action="/bengkels" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Nama Bengkel</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"  autofocus>
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" rows="5" ></textarea>
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="5" ></textarea>
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
                            <input type="text" class="form-control @error('latitude') is-invalid @enderror" name="latitude" id="latitude" >
                            @error('latitude')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input type="text" class="form-control @error('longitude') is-invalid @enderror" name="longitude" id="longitude" >
                            @error('longitude')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Bengkel Photo</label>
                            <img class="img-preview img-fluid mb-3 col-sm-2">
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        {{-- <div class="form-group increment">
                            <label for="">Photo</label>
                            <div class="input-group">
                                <input type="file" name="photo[]" class="form-control">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-primary btn-add"><i class="fas fa-plus-square"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="clone invisible">
                            <div class="input-group mt-2">
                                <input type="file" name="photo[]" class="form-control">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-danger btn-remove"><i class="fas fa-minus-square"></i></button>
                                </div>
                            </div>
                        </div> --}}
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        window.action = "submit"

        // untuk add multiple image
        // jQuery(document).ready(function () {
        //     jQuery(".btn-add").click(function () {
        //         let markup = jQuery(".invisible").html();
        //         jQuery(".increment").append(markup);
        //     });
        //     jQuery("body").on("click", ".btn-remove", function () {
        //         jQuery(this).parents(".input-group").remove();
        //     })
        // })

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

