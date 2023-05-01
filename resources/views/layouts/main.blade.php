<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIBENG - {{ $title }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"/> 
    <link rel="stylesheet" type="text/css" href="/css/main.css"/>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-ui.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
    <script src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js" type="text/javascript" charset="utf-8"></script>
 
    @stack('style')
</head>
<body>
    @include('partials.navbar')

    <div class="container">
        @yield('container')
    </div>
    
    <footer class="test" style="margin-top: 100px">
      <div class="container p-4">
        <div class="row">
          <div class="col-lg-4">
              <img src="/assets/images/Atensi.png">
              <img src="/assets/images/Kemensos.png">
          </div>
          <div class="col-lg-2 footer-text">
              <h5 class="text-white">About Us</h5>
              <ul class="list-unstyled">
                <li>
                  <a href="#" class="text-white">Our Story</a>
                </li>
                <li>
                  <a href="#" class="text-white">Visi & Misi</a>
                </li>
                <li>
                  <a href="#" class="text-white">Teams</a>
                </li>
                {{-- <li>
                  <a href="#" class="text-white">Sarana & Prasarana</a>
                </li> --}}
              </ul>
          </div>
          <div class="col-lg-3 footer-text">
              <h5 class="text-white">Product</h5>
              <ul class="list-unstyled mb-0">
                <li>
                  <a href="#" class="text-white">Feature</a>
                </li>
                <li>
                  <a href="#" class="text-white">Partnerships</a>
                </li>
                <li>
                  <a href="#" class="text-white">Testimonials</a>
                </li>
              </ul>
          </div>
          <div class="col-lg-3 footer-text">
              <h5 class="text-white">Follow Our Social Media</h5>
              <div class="image">
                  <a href="#">
                      <i class="fa-brands fa-facebook-square fa-2xl"></i>
                  </a>
                  <a href="#">
                      <i class="fa-brands fa-instagram fa-2xl"></i>
                  </a>
                  <a href="#">
                      <i class="fa-brands fa-youtube fa-2xl"></i>
                  </a>
              </div>
          </div>
          <div class="d-flex flex-column flex-sm-row justify-content-between py-3 my-2 border-top">
            <p class="text-white">&copy; 2023 SIBENG Company, Inc. All rights reserved.</p>
          </div>
        </div>
      </div>
  </footer>

    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/4406ce97fd.js" crossorigin="anonymous"></script>
    <script src="/js/here.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.slim.js" integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>
    <script>
      window.hereApiKey = "{{ env('HERE_API_KEY') }}"
    </script>
    @stack('script')
</body>
</html>