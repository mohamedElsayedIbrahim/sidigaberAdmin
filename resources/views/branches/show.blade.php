

@extends('layouts.app')

@section('title')
    App | branches
@endsection

@section('header')
    @include('layouts.header')
@endsection

@section('content')

<div class="navigation">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route("app.board")}}">@lang('site.home')</a></li>
          <li class="breadcrumb-item"><a href="{{route("branches.index")}}">@lang('dashboard.branches.index')</a></li>
          <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.studentInfo')</li>
        </ol>
    </nav>
</div>

    <div class="bg-light p-4 rounded">
        <h1>Show branch</h1>
        <div class="lead">
            
        </div>
        
        <div class="container mt-4">
            <div>
                Name: {{ $branch->title }}
            </div>
        </div>

    </div>
    <div class="mt-4">
        <a href="{{ route('branches.edit', $branch->id) }}" class="btn btn-info">Edit</a>
        <a href="{{ route('branches.index') }}" class="btn btn-default">Back</a>
    </div>
@endsection