
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

<x-alert></x-alert>

    <div class="bg-light p-4 rounded">
        <h1>Add new branch</h1>
        <div class="lead">
            Add new branch and assign role.
        </div>

        <div class="container mt-4">
            <form method="POST" action="">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Name</label>
                    <input value="{{ old('title') }}" 
                        type="text" 
                        class="form-control" 
                        name="title" 
                        placeholder="Name" required>

                    @if ($errors->has('title'))
                        <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="alise" class="form-label">Alise Name</label>
                    <input value="{{ old('alise') }}" 
                        type="text" 
                        class="form-control" 
                        name="alise" 
                        placeholder="Name" required>

                    @if ($errors->has('alise'))
                        <span class="text-danger text-left">{{ $errors->first('alise') }}</span>
                    @endif
                </div>
                

                <button type="submit" class="btn btn-primary">Save Branch</button>
                <a href="{{ route('branches.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection