@extends('layouts.app')

@section('title')
    @lang('site.home')
@endsection

@section('content')

<div class="row">
    <div class="col-md-6">
        <h1 class="pb-3">@lang('site.welcome')</h1>
        @include('layouts.error')
        <form method="POST" action="{{ route('login.handel') }}" novalidate class="row g-3 needs-validation">

            @csrf

            <div class="col-md-12 mb-3">
              <label for="exampleInputEmail1" class="form-label text-capitalize">@lang('login.username')</label>
              <input type="text" maxlength="100" minlength="3" name="name" required  class="form-control" id="exampleInputEmail1">
            </div>
            <div class="col-md-12 mb-3">
              <label for="exampleInputPassword1" class="form-label text-capitalize">@lang('login.password')</label>
              <input type="password" maxlength="30" minlength="5" name="password" required class="form-control" id="exampleInputPassword1">
            </div>
            
            <div class="col-12">
                <button class="btn btn-primary" type="submit">@lang('site.login')</button>
            </div>
          </form>
    </div>

    <div class="col-md-6">
        <div class="text-center">
            <img src="{{ asset('image/sidigaber.png') }}" alt="sidigaber">
        </div>
        <p class="lead py-3">
            @lang('site.summary')
        </p>
    </div>
</div>
@endsection