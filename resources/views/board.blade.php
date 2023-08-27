@extends('layouts.app')

@section('title')
    App Board
@endsection

@section('header')
    @include('layouts.header')
@endsection

@section('content')

<div class="row">

    <div class="col-md-9">
      <h2 class="text-capitalize">services</h2>

      <div class="row">
        <div class="col-md-6">
          <div class="card my-2">
              <div class="card-body">
                <h5 class="card-title"><a href="{{ route('students.index') }}" class="card-link">@lang('dashboard.studentFile')</a></h5>
                <h6 class="card-subtitle mb-2 text-muted">This feature for know how upload the bank transaction</h6>
                <p class="card-text">You can access students  data how upload transaction files.</p>
                <a href="{{ route('students.index') }}" class="card-link">@lang('dashboard.service')</a>
              </div>
            </div>
      </div>

      <div class="col-md-6">
        <div class="card my-2">
            <div class="card-body">
              <h5 class="card-title"><a href="{{ route('users.index') }}" class="card-link">@lang('dashboard.users')</a></h5>
              <h6 class="card-subtitle mb-2 text-muted">This feature for know how upload the bank transaction</h6>
              <p class="card-text">You can access students  data how upload transaction files.</p>
              <a href="{{ route('users.index') }}" class="card-link">@lang('dashboard.service')</a>
            </div>
          </div>
      </div>

      <div class="col-md-6">
        <div class="card my-2">
            <div class="card-body">
              <h5 class="card-title"><a href="{{ route('roles.index') }}" class="card-link">@lang('dashboard.roles')</a></h5>
              <h6 class="card-subtitle mb-2 text-muted">This feature for know how upload the bank transaction</h6>
              <p class="card-text">You can access students  data how upload transaction files.</p>
              <a href="{{ route('roles.index') }}" class="card-link">@lang('dashboard.service')</a>
            </div>
          </div>
      </div>

      <div class="col-md-6">
        <div class="card my-2">
            <div class="card-body">
              <h5 class="card-title"><a href="{{ route('permissions.index') }}" class="card-link">@lang('dashboard.permissions')</a></h5>
              <h6 class="card-subtitle mb-2 text-muted">This feature for know how upload the bank transaction</h6>
              <p class="card-text">You can access students  data how upload transaction files.</p>
              <a href="{{ route('permissions.index') }}" class="card-link">@lang('dashboard.service')</a>
            </div>
          </div>
      </div>

      <div class="col-md-6">
        <div class="card my-2">
            <div class="card-body">
              <h5 class="card-title"><a href="{{ route('branches.index') }}" class="card-link">@lang('dashboard.branches')</a></h5>
              <h6 class="card-subtitle mb-2 text-muted">This feature for know how upload the bank transaction</h6>
              <p class="card-text">You can access students  data how upload transaction files.</p>
              <a href="{{ route('branches.index') }}" class="card-link">@lang('dashboard.service')</a>
            </div>
          </div>
      </div>

      <div class="col-md-6">
        <div class="card my-2">
            <div class="card-body">
              <h5 class="card-title"><a href="{{ route('stages.index') }}" class="card-link">@lang('dashboard.stages')</a></h5>
              <h6 class="card-subtitle mb-2 text-muted">This feature for know how upload the bank transaction</h6>
              <p class="card-text">You can access students  data how upload transaction files.</p>
              <a href="{{ route('stages.index') }}" class="card-link">@lang('dashboard.service')</a>
            </div>
          </div>
      </div>

      <div class="col-md-6">
        <div class="card my-2">
            <div class="card-body">
              <h5 class="card-title"><a href="{{ route('academicyears.index') }}" class="card-link">@lang('dashboard.academicyears')</a></h5>
              <h6 class="card-subtitle mb-2 text-muted">This feature for know how upload the bank transaction</h6>
              <p class="card-text">You can access students  data how upload transaction files.</p>
              <a href="{{ route('academicyears.index') }}" class="card-link">@lang('dashboard.service')</a>
            </div>
          </div>
      </div>

      </div>
    </div>

    <div class="col-md-3">
      <div class="statistics p-3">
        <h2 class="text-danger"><u>@lang('dashboard.statistics')</u></h2>
        {{-- <ul class="list-unstyled">
          <li>@lang('dashboard.TotalStudent'): <strong>{{$studentNumber}}</strong></li>
          <li>@lang('dashboard.PaiedSchool'): <strong>{{$paied}}</strong></li>
          <li>@lang('dashboard.PaiedBus'): <strong>{{$busPaied}}</strong></li>
        </ul> --}}
      </div>
    </div>
</div>



@endsection