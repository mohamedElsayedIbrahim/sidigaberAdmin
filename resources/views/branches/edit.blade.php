
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
        <h1>Update branch</h1>
        <div class="lead">
            
        </div>
        
        <div class="container mt-4">
            <form method="post" action="{{ route('branches.update', $branch->id) }}">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Name</label>
                    <input value="{{ $branch->title }}" 
                        type="text" 
                        class="form-control" 
                        name="title" 
                        placeholder="Name" required>

                    @if ($errors->has('title'))
                        <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                

                <button type="submit" class="btn btn-primary">Update branch</button>
                <a href="{{ route('branches.index') }}" class="btn btn-default">Cancel</button>
            </form>
        </div>

    </div>
@endsection