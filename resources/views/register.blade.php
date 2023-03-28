<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>SIBENG - {{ $title }}</title>

    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"/> 
    <link rel="stylesheet" type="text/css" href="/css/login.css"/> 

  </head>
  <body>

<div class="row justify-content-center">
  <div class="col-lg-3">
    <main class="form-registration w-100 m-auto">
      <form action="/register" method="POST">
        @csrf
        <h1>SIBENG</h1>
        <h1 class="h3 mb-3 fw-normal">Registration Form</h1>
    
        <div class="form-floating">
          <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
          <label for="name">Name</label>
          @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
          <label for="username">Username</label>
          @error('username')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" required value="{{ old('email') }}">
          <label for="email">Email</label>
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
          <label for="password">Password</label>
          @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
    
        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
        <div class="home mt-2 mb-3">
          <small>Already have an account ? <a href="/login">Login Now!</a></small>
        </div>
        <p class="mt-3 mb-3 text-muted">&copy; 2023</p>
      </form>
    </main>
  </div>
</div>
    
  </body>
</html>
