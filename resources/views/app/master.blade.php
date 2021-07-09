<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Administrator - {{ config('app.name', 'Laravel') }}</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('stisla/node_modules/jqvmap/dist/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/node_modules/summernote/dist/summernote-bs4.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/node_modules/owl.carousel/dist/assets/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/node_modules/owl.carousel/dist/assets/owl.theme.default.min.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('stisla/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/assets/css/components.css') }}">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle">
            @if(Auth::user()->foto == "")
            <img src="{{ asset('gambar/sistem/user.png')}}" alt="Avatar" class="avatar">
            @else
            <img src="{{ asset('gambar/user/'.Auth::user()->foto) }}" class="avatar">
            @endif

            <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item has-icon">
              <span>{{ Auth::user()->name }}</span>
               <br> 
              <span class="text-muted">{{ Auth::user()->email }}</span>
              </a>
              <a href="{{ route('password') }}" class="dropdown-item has-icon">
                <i class="icon-key"></i> Ganti Password
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST">
               @csrf
              </form>
              <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item has-icon"><i class="icon-key"></i>Logout</a>
            </div>
          </li>
        </ul>
      </nav>

      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ url('/home') }}"><h4>Arti<b>Batik</b></h4></a>
            @if(Auth::user()->foto == "")
               <img class="mr-2" src="{{ asset('gambar/sistem/user.png')}}" height="60" width="60" alt="">
               @else
               <img class="mr-2" src="{{ asset('gambar/user/'.Auth::user()->foto) }}" height="60" width="60">
               @endif
                    <h5 class="mb-0">{{ Auth::user()->name }}</h5>
                    <p class="text-muted mb-0"><?php if(Auth::user()->level == "admin"){ echo "Administrator";}else{ echo "Bendahara"; } ?></p>
                </li>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/home') }}"><b>Arti</b></br><b>Batik</b></a>
          </div>
          <ul class="sidebar-menu">
              
          <li class="menu-text">
              <li class="menu-header">Dashboard</li>
                <li>
                    <a href="{{ route('kategori') }}" aria-expanded="false">
                        <span class="nav-text">Data Kategori</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('transaksi') }}" aria-expanded="false">
                        <span class="nav-text">Data Transaksi</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('laporan') }}" aria-expanded="false">
                        <span class="nav-text">Laporan</span>
                    </a>
                </li>

                @if(Auth::user()->level == "admin")

                        <li>
                            <a href="{{ route('user') }}" aria-expanded="false">
                            <span class="nav-text">Data Pengguna</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('user.tambah') }}" aria-expanded="false">
                            <span class="nav-text">Tambah Pengguna Baru</span>
                            </a>
                        </li>

                @endif

                <li>
                    <a href="{{ route('password') }}" aria-expanded="false">
                        </i><span class="nav-text">Ganti Password</span>
                    </a>
                </li>
            

                <li>
                      <a href="{{ route('logout') }}" aria-expanded="false" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                          <span class="nav-text">Log Out</span>
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                </li>
              </li>
            </ul>
        </aside>
      </div>

      <!-- Main Content -->
      
      @yield('konten')
      
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2021 <div class="bullet"></div> Copyright <a>ArtiBatik</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('stisla/assets/js/stisla.js') }}"></script>

  <!-- JS Libraies -->
  <script src="{{ asset('stisla/node_modules/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
  <script src="{{ asset('stisla/node_modules/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('stisla/node_modules/owl.carousel/dist/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('stisla/node_modules/summernote/dist/summernote-bs4.js') }}"></script>
  <script src="{{ asset('stisla/node_modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
  

  <!-- Template JS File -->
  <script src="{{ asset('stisla/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('stisla/assets/js/custom.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('stisla/assets/js/page/index.js') }}"></script>
  <script src="{{ asset('stisla/assets/js/page/components-statistic.js') }}"></script>



</body>
</html>
