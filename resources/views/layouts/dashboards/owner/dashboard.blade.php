@extends('layouts.admin')

@section('content')
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
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
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
    <div class="card-body">
        
        <h5 class="card-title text-primary">Anda telah login pada halaman sebagai Admin Owner, {{ Auth::user()->name }}.</h5>
        <p class="mb-4">
        You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
        your profile.
        </p>

        <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
    </div>

    {{-- <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        You are logged in! As Admin Gudang, {{ Auth::user()->name }} 
    </div> --}}
@endsection
