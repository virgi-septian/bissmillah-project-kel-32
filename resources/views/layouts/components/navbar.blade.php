<!-- Navbar -->
<nav
  class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
  id="layout-navbar"
>
  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
      <i class="bx bx-menu bx-sm"></i>
    </a>
  </div>

  <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <!-- Search -->
    @guest
    <div class="navbar-nav align-items-center">
      <div class="nav-item d-flex align-items-center">
        <i class="bx bx-search fs-4 lh-0"></i>
        <input
          type="text"
          class="form-control border-0 shadow-none"
          placeholder="Search..."
          aria-label="Search..."
        />
      </div>
    </div>
    @else  
    @endguest
    <!-- /Search -->
    
    <!-- informasi-->
    <div class="navbar-nav align-items-center">
      <div class="nav-item d-flex align-items-center">
        <a class="dropdown-item" href=""><i class="bi bi-building"></i> Informasi</a>
      </div>
    </div>
    <!-- /informasi-->

    <!-- lokasi-->
    <div class="navbar-nav align-items-center">
      <div class="nav-item d-flex align-items-center">
        <a class="dropdown-item" href=""><i class="bi bi-geo-alt-fill"></i> Lokasi</a>
      </div>
    </div>
    <!-- /lokasi-->

    <ul class="navbar-nav flex-row align-items-center ms-auto">
      <!-- Place this tag where you want the button to render. -->
      <li class="nav-item lh-1 me-3">
        <a
          class="github-button"
          data-icon="octicon-star"
          data-size="large"
          data-show-count="true"
          aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
          >
          {{Auth::user()->name}}
          </a
        >
      </li>
      
      

      <!-- User -->
      <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(1);" data-bs-toggle="dropdown">
          <div class="avatar avatar-online">
            <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
          </div>
        </a>
        
        <ul class="dropdown-menu dropdown-menu-end">
          
          <li>
            <a class="dropdown-item" href="#">
              <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                  <div class="avatar avatar-online">
                    <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </div>
                <div class="flex-grow-1">
                  <div class="info">
                    @guest
                      <span class="fw-semibold d-block"> </span>
                    @else
                      <span class="fw-semibold d-block">{{Auth::user()->name}}</span>
                    @endguest
                  </div>  
                </div>
              </div>
            </a>
          </li>
          
          <li>
            <div class="dropdown-divider"></div>
          </li>
          


      @guest
      @else

      <li>
        <a class="dropdown-item" role="button" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}
          <i class="bx bx-power-off me-2"></i>
          <span class="align-middle">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </span>
        </a>
      </li>    


      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-sign-out-alt"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a class="nav-link bg-light" role="button" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </a>
        </div>
      </li>
      @endguest
      @guest
          @if(Route::has('login'))
            <li>
              <a class="dropdown-item" href="{{route('login')}}">
                
                <span class="align-middle">
                  <i class="bi bi-box-arrow-in-right me-2"></i> {{ __('Login')}}
                </span>
              </a>
            </li>
            
            @endif
            @if(Route::has('register'))
              <li>
              <a class="dropdown-item" href="{{route('register')}}">
                
                <span class="align-middle">
                  <i class="bi bi-person-lines-fill me-2"></i>
                  {{ __('Register')}}
                </span>
              </a>
            </li>
            @endif
          @else
      @endguest




        </ul>
      </li>
      <!--/ User -->
    </ul>
  </div>
</nav>

<!-- / Navbar -->