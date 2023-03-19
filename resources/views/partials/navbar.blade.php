<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
            <a class="navbar-brand" href="#">
              {{-- <img src="#" width="30" height="24" class="d-inline-block align-text-top"> --}}
              SIBENG
            </a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Home" ? 'active' : '') }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Cari Bengkel" ? 'active' : '') }}" href="/cari-bengkel">Cari Bengkel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Haversine" ? 'active' : '') }}" href="/haversine">Haversine</a>
          </li>     
          <a href="/login" class="btn btn-master btn-primary ms-3">
            Login
          </a>
        </ul>
      </div>
    </div>
</nav>