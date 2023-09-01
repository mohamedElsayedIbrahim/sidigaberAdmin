
@extends('layouts.app')

@section('title')
    App | academicyears
@endsection

@section('header')
    @include('layouts.header')
@endsection

@section('content')

<div class="navigation">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route("app.board")}}">@lang('site.home')</a></li>
          <li class="breadcrumb-item"><a href="{{route("academicyears.index")}}">@lang('dashboard.academicyears.index')</a></li>
          <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.studentInfo')</li>
        </ol>
    </nav>
</div>

<x-alert></x-alert>

    <div class="bg-light p-4 rounded">
        <h1>Add new academic year</h1>
        <div class="lead">
            Add new academic year.
        </div>

        <div class="container mt-4">
            <form method="POST" action="">
                @csrf
                <div class="mb-3">
                    <label for="year" class="form-label">Name</label>
                    <input value="{{ old('year') }}" 
                        type="text" 
                        class="form-control" 
                        name="year" 
                        placeholder="Name" required>

                    @if ($errors->has('year'))
                        <span class="text-danger text-left">{{ $errors->first('year') }}</span>
                    @endif
                </div>
                

                <button type="submit" class="btn btn-primary">Save Branch</button>
                <a href="{{ route('academicyears.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection