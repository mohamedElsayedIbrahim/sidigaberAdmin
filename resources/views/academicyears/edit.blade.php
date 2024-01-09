
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
        <h1>Update academicyear</h1>
        <div class="lead">
            
        </div>
        
        <div class="container mt-4">
            <form method="post" action="{{ route('academicyears.update', $academicyear->id) }}">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="year" class="form-label">Name</label>
                    <input value="{{ $academicyear->year }}" 
                        type="text" 
                        class="form-control" 
                        name="year" 
                        placeholder="Name" required>

                    @if ($errors->has('year'))
                        <span class="text-danger text-left">{{ $errors->first('year') }}</span>
                    @endif
                </div>
                

                <button type="submit" class="btn btn-primary">Update academicyear</button>
                <a href="{{ route('academicyears.index') }}" class="btn btn-default">Cancel</button>
            </form>
        </div>

    </div>
@endsection