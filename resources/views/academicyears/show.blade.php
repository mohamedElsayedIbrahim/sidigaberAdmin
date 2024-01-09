

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

    <div class="bg-light p-4 rounded">
        <h1>Show academic year</h1>
        <div class="lead">
            
        </div>
        
        <div class="container mt-4">
            <div>
                Academic years: {{ $branch->year }}
            </div>
        </div>

    </div>
    <div class="mt-4">
        <a href="{{ route('academicyears.edit', $branch->id) }}" class="btn btn-info">Edit</a>
        <a href="{{ route('academicyears.index') }}" class="btn btn-default">Back</a>
    </div>
@endsection