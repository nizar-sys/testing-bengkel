@extends('layouts.dashboard.main')

@section('container')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="d-flex justify-content-between mb-3">
                <div id="backTo">
                    <a href="/users" class="btn btn-secondary"><i class="fa-solid fa-angle-left"></i> Back</a>
                </div>
            </div>

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-header">Update data users!</div>
                <div class="card-body">
                    <form action="/users/{{ $users->id }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $users->name) }}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username', $users->username) }}" required>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email', $users->email) }}" required>
                            @error('email')
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
    {{-- <script>
        window.action = "submit"

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
    </script> --}}
@endpush