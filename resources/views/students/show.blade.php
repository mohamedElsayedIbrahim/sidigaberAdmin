

@extends('layouts.app')

@section('title')
    App | students
@endsection

@section('header')
    @include('layouts.header')
@endsection

@section('content')

<div class="navigation">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route("app.board")}}">@lang('site.home')</a></li>
          <li class="breadcrumb-item"><a href="{{route("students.index")}}">@lang('dashboard.studentFile')</a></li>
          <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.studentInfo')</li>
        </ol>
    </nav>
</div>

    <div class="bg-light p-4 rounded">
        <h1>Show student</h1>
        <div class="lead">
            
        </div>
        
        <div class="container mt-4">
            <div>
                Name: {{ $student->fullname }}
            </div>
            <div>
                National Id: {{ $student->id }}
            </div>
            <div>
                Gender: {{ $student->gender }}
            </div>
        </div>

    </div>
    <div class="mt-4">
        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-info">Edit</a>
        <a href="{{ route('students.index') }}" class="btn btn-default">Back</a>
    </div>
@endsection