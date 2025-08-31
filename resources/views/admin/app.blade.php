@php
use Illuminate\Support\Facades\Storage;
@endphp
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Paneli</title>
    @include('admin.layouts.style')
  </head>
  <body>
    <aside class="sidebar-nav-wrapper" id="sidebar">
      <div class="navbar-logo">
        <a href="{{ route('app') }}">
          <img src="{{ asset('asset/images/logo/logo.svg') }}" alt="logo" />
        </a>
        <!-- Mobil kapat butonu -->
        <button type="button" class="btn btn-link d-md-none mobile-close-btn" id="mobile-sidebar-close">
          <i class="lni lni-close" style="font-size: 20px; color: #666;"></i>
        </button>
      </div>
      <nav class="sidebar-nav">
        <ul>
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}">
              <span class="icon"><i class="lni lni-dashboard"></i></span>
              <span class="text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.books.index') }}">
              <span class="icon"><i class="lni lni-book"></i></span>
              <span class="text">Kitaplar</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.journals.index') }}">
              <span class="icon"><i class="lni lni-library"></i></span>
              <span class="text">Jurnallar</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.sliders.index') }}">
              <span class="icon"><i class="lni lni-image"></i></span>
              <span class="text">Slayd</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.verses.index') }}">
              <span class="icon"><i class="lni lni-quotation"></i></span>
              <span class="text">Günün Ayəsi</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.hadiths.index') }}">
              <span class="icon"><i class="lni lni-quotation"></i></span>
              <span class="text">Günün Hədisi</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.abouts.index') }}">
              <span class="icon"><i class="lni lni-user"></i></span>
              <span class="text">Haqqımızda</span>
            </a>
          </li>
        </ul>
      </nav>
    </aside>
    <div class="overlay"></div>
    <main class="main-wrapper">
      <header class="header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="header-content d-flex justify-content-between align-items-center">
                <!-- Sol taraf - Mobil Menu ve Logo -->
                <div class="header-left d-flex align-items-center">
                  <!-- Mobil Burger Menu -->
                  <div class="mobile-menu-btn d-md-none me-2">
                    <button type="button" class="btn btn-link p-0" id="mobile-menu-toggle">
                      <i class="lni lni-menu" style="font-size: 24px; color: #333;"></i>
                    </button>
                  </div>
                  
                  <!-- Logo (mobilde görünür) -->
                  <div class="mobile-logo d-md-none">
                    <img src="{{ asset('asset/images/logo/logo.svg') }}" alt="logo" style="height: 35px;" />
                  </div>
                </div>
                
                <!-- Sağ taraf - Profil Menu -->
                <div class="header-right">
                  <div class="profile-box">
                    <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      <div class="profile-info">
                        <div class="info">
                          <div class="image">
                            @auth
                              <img src="{{ Auth::user()->getSafeProfilePhotoUrl() }}" alt="Profile Photo" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;" />
                            @else
                              <img src="{{ asset('asset/images/profile/profile-image.png') }}" alt="Default Profile" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;" />
                            @endauth
                          </div>
                          <div>
                          <h6 class="fw-500">{{ Auth::user()->name ?? 'Admin' }}</h6>
                            <p>Admin</p>
                        </div>
                        </div>
                      </div>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                      <li>
                        <a href="{{ route('admin.profile.edit') }}" class="dropdown-item">
                          <i class="lni lni-user"></i> Profili düzənle
                        </a>
                      </li>
                      <li class="divider"></li>
                      <li>
                      <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger" style="background:none;border:none;width:100%;text-align:left;">
                          <i class="lni lni-exit"></i> Çıxış et
                        </button>
                      </form>
                      </li>
                    </ul>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
      <section class="section">
        <div class="container-fluid">
          @yield('content')
        </div>
      </section>
    </main>
@include('admin.layouts.script')
  </body>
</html>
