<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />
    {{-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="{{asset('Bootstrap-Icon/node_modules/bootstrap-icons/font/bootstrap-icons.css')}}">
    <!-- Favicon -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <!-- Icons. Uncomment required icon fonts -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/izitoast.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/select2.css') }}" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}"class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}"/>
    {{-- leatlef --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
    integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
    crossorigin=""/>
    {{-- <link rel="stylesheet" href="{{ asset('datatables.min.css') }}"/> --}}
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <!-- Page Datatable -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatable.css') }}" />
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
    integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
    crossorigin=""></script>
    <!-- Page JS -->
    @yield('css')
  </head>

  <body style="color: black">
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        @include('layouts.components.sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          {{-- navbar --}}
          @include('layouts.components.navbar')
          {{-- / navbar --}}

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              @role('owner')
              <div class="row">
                <div class="col-3 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                          <img
                            src="../assets/img/icons/unicons/chart-success.png"
                            alt="chart success"
                            class="rounded"
                          />
                        </div>
                        <div class="dropdown">
                          <button
                            class="btn p-0"
                            type="button"
                            id="cardOpt3"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          >
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                          </div>
                        </div>
                      </div>
                      <span class="fw-semibold d-block mb-1">Profit</span>
                      <h3 class="card-title mb-2">$12,628</h3>
                      <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
                    </div>
                  </div>
                </div>
                <div class="col-3 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                          <img
                            src="../assets/img/icons/unicons/wallet-info.png"
                            alt="Credit Card"
                            class="rounded"
                          />
                        </div>
                        <div class="dropdown">
                          <button
                            class="btn p-0"
                            type="button"
                            id="cardOpt6"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          >
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                          </div>
                        </div>
                      </div>
                      <span>Sales</span>
                      <h3 class="card-title text-nowrap mb-1">$4,679</h3>
                      <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small>
                    </div>
                  </div>
                </div>
                <div class="col-3 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                          <img src="../assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                        </div>
                        <div class="dropdown">
                          <button
                            class="btn p-0"
                            type="button"
                            id="cardOpt4"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          >
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                          </div>
                        </div>
                      </div>
                      <span class="d-block mb-1">Payments</span>
                      <h3 class="card-title text-nowrap mb-2">$2,456</h3>
                      <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>
                    </div>
                  </div>
                </div>
                <div class="col-3 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                          <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                        </div>
                        <div class="dropdown">
                          <button
                            class="btn p-0"
                            type="button"
                            id="cardOpt1"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          >
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="cardOpt1">
                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                          </div>
                        </div>
                      </div>
                      <span class="fw-semibold d-block mb-1">Transactions</span>
                      <h3 class="card-title mb-2">$14,857</h3>
                      <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small>
                    </div>
                  </div>
                </div>
              </div>
              
              @endrole
              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                    @yield('content')
                </div>
              </div>
            </div>
            <!-- / Content -->
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
  </div>
      <!-- / Layout wrapper -->

    {{-- <div class="buy-now">
      <a
        href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
        target="_blank"
        class="btn btn-danger btn-buy-now"
        >Upgrade to Pro</a
      >
    </div> --}}
   
    <!-- Core JS -->
    
    <!-- build:js assets/vendor/js/core.js -->
    <script type="text/javascript" src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->
    
    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <!-- Main JS -->
    <script src="{{asset('js/select2.js')}}"></script>    
    <script src="{{asset('js/sweetalert.js')}}"></script>
    <script src="{{asset('js/izitoast.js')}}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    {{-- leaflet --}}
   
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
    <script type="text/javascript"" src="{{ asset('assets/plugins/datatables/jquery.dataTables.js') }}"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
  </body>
</html>

