
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
          <li class="breadcrumb-item"><a href="{{route("students.index")}}">@lang('dashboard.students.index')</a></li>
          <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.studentInfo')</li>
        </ol>
    </nav>
</div>

<x-alert></x-alert>


    <div class="bg-light p-4 rounded">
        <h1>Update student</h1>
        <div class="lead">
            
        </div>
        
        <div class="container mt-4">
            <form method="post" action="{{ route('students.update', $student->id) }}">
                @method('patch')
                @csrf
                
                <div class="mb-3">
                    <label for="fullname" class="form-label">full Name</label>
                    <input value="{{ old('fullname') ?? $student->fullname }}"
                        type="text" 
                        class="form-control" 
                        name="fullname" 
                        placeholder="Name" required>

                    @if ($errors->has('fullname'))
                        <span class="text-danger text-left">{{ $errors->first('fullname') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="id" class="form-label">National ID</label>
                    <input value="{{ old('id') ?? $student->id }}" 
                        type="text" 
                        class="form-control" 
                        name="id" 
                        placeholder="National ID" maxlength="14" minlength="14" required>

                    @if ($errors->has('id'))
                        <span class="text-danger text-left">{{ $errors->first('id') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="gender" class="form-label">gender</label>
                    <select class="form-control" name="gender"  required>
                        <option>select student gender</option>
                        <option value="male" {{ old('gender') ?? $student->gender == 'male' ? 'selected':'' }}>Male</option>
                        <option value="female" {{ old('gender') ?? $student->gender == 'female' ? 'selected':'' }}>Female</option>
                    </select>

                    @if ($errors->has('gender'))
                        <span class="text-danger text-left">{{ $errors->first('gender') }}</span>
                    @endif
                </div>
              
                <button type="submit" class="btn btn-primary">Update student</button>
                <a href="{{ route('students.index') }}" class="btn btn-default">Cancel</button>
            </form>
        </div>

    </div>
@endsection