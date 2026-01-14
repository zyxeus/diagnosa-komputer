<header id="header" class="header d-flex align-items-center sticky-top">
  <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
    <a href="{{ url('/') }}" class="logo d-flex align-items-center">
      <img src="{{ asset('assets/img/logo.png') }}" alt="CekMyPC Logo" class="img-fluid me-2" style="max-height: 40px;">
      <h1 class="sitename">Cek My PC</h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul class="navmenu">
        <li><a href="{{ route('home') }}" class="{{ Route::is('home') ? 'active' : '' }}">Beranda</a></li>
        <li><a href="{{ route('information') }}" class="{{ Route::is('information') ? 'active' : '' }}">Informasi</a></li>
        <li><a href="{{ route('diagnosis.index') }}" class="{{ Route::is('diagnosis.index') ? 'active' : '' }}">Diagnosa</a></li>
        <li><a href="{{ route('about') }}" class="{{ Route::is('about') ? 'active' : '' }}">Tentang Kami</a></li>
        @auth
        <li><a href="{{ route('user.profile') }}"> 👤 {{ \Illuminate\Support\Str::before(Auth::user()->name, ' ') }}</a></li>
        <li>
          <form action="{{ route('user.logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-link" style="color:white; text-decoration: none;">Logout</button>
          </form>
        </li>
        @else
          <li><li><a href="{{ route('user.login.form') }}">Login</a></li>
        @endauth
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
    
  </div>
</header>
