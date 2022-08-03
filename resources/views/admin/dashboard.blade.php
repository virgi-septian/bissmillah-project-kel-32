@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-gray text-light">
                <div class="card-header border-bottom border-1">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! As Admin {{ Auth::user()->name }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
