@extends('layouts.admin')

@section('content')

<div class="card">               
    <div class="card-header mb-3 border-bottom border-3"><h4>User Management</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-12">
            <div class="nav-align-top mb-4">
            <ul class="nav nav-pills mb-4" role="tablist">
                <li class="nav-item">
                <button
                  type="button"
                  class="nav-link active"
                  role="tab"
                  data-bs-toggle="tab"
                  data-bs-target="#navs-pills-top-home"
                  aria-controls="navs-pills-top-home"
                  aria-selected="true"
                >
                  User
                </button>
                </li>
                <li class="nav-item">
                <button
                  type="button"
                  class="nav-link"
                  role="tab"
                  data-bs-toggle="tab"
                  data-bs-target="#navs-pills-top-profile"
                  aria-controls="navs-pills-top-profile"
                  aria-selected="false"
                >
                  Permission
                </button>
                </li>
                <li class="nav-item">
                <button
                  type="button"
                  class="nav-link"
                  role="tab"
                  data-bs-toggle="tab"
                  data-bs-target="#navs-pills-top-messages"
                  aria-controls="navs-pills-top-messages"
                  aria-selected="false"
                >
                  Role
                </button>
                </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
                @include('layouts.dashboards.owner.user-management.user.body')
              </div>
              <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
                @include('layouts.dashboards.owner.user-management.permission.body')
              </div>
              <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
                @include('layouts.dashboards.owner.user-management.role.body')
              </div>
            </div>

          </div>
        </div>
        
    </div>
</div>
<script type="text/javascript" src="{{ asset('js/jquery-3.5.1.js') }}"></script>
@include('layouts.dashboards.owner.user-management.user.script')
@include('layouts.dashboards.owner.user-management.permission.script')
@include('layouts.dashboards.owner.user-management.role.script')
@endsection
