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
  <body class="text-center">

<div class="row justify-content-center">
  <div class="col-lg-3">

    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    @if (session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
  
    <main class="form-signin w-100 m-auto">
      <form action="/login" method="POST">
        @csrf
        <h1>SIBENG</h1>
        <h1 class="h3 mb-3 fw-normal">Login Form</h1>
    
        <div class="form-floating">
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" required autofocus value="{{ old('email') }}">
          <label for="email">Email address</label>
        </div>
        @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
        <div class="form-floating">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
          <label for="password">Password</label>
        </div>
    
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <div class="home mt-2 mb-3">
          <small>Don't have account ? <a href="/register">Register Now!</a></small>
          <br>
          <small>Want to see our homepage ? <a href="/">SIBENG</a></small>
        </div>
        <p class="mt-3 mb-3 text-muted">&copy; 2023</p>
      </form>
    </main>
  </div>
</div>
    
  </body>
</html>
