@extends('layouts.admin')

@section('content')
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
