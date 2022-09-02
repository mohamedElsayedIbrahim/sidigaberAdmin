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
                <h5 class="card-title"><a href="{{ route('app.student') }}" class="card-link">@lang('dashboard.bankTitle')</a></h5>
                <h6 class="card-subtitle mb-2 text-muted">This feature for know how upload the bank transaction</h6>
                <p class="card-text">You can access students  data how upload transaction files.</p>
                <a href="{{ route('app.student') }}" class="card-link">@lang('dashboard.service')</a>
              </div>
            </div>
      </div>
  
      <div class="col-md-6">
          <div class="card my-2">
              <div class="card-body">
                <h5 class="card-title"><a href="{{ route('app.student.bus') }}" class="card-link">@lang('dashboard.busTitle')</a></h5>
                <h6 class="card-subtitle mb-2 text-muted">This feature for know how upload the bus transaction</h6>
                <p class="card-text">You can access students  data how upload transaction files.</p>
                <a href="{{ route('app.student.bus') }}" class="card-link">@lang('dashboard.service')</a>
              </div>
            </div>
      </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="statistics p-3">
        <h2 class="text-danger"><u>@lang('dashboard.statistics')</u></h2>
        <ul class="list-unstyled">
          <li>@lang('dashboard.TotalStudent'): <strong>{{$studentNumber}}</strong></li>
          <li>@lang('dashboard.PaiedSchool'): <strong>{{$paied}}</strong></li>
          <li>@lang('dashboard.PaiedBus'): <strong>{{$busPaied}}</strong></li>
        </ul>
      </div>
    </div>
</div>



@endsection