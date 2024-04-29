
@extends('layouts.app')

@section('title')
    App | students files
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
        <h1>Add new branch</h1>
        <div class="lead">
            Add new branch and assign role.
        </div>

        <div class="container mt-4">
            <form method="POST" action="{{ route('students.store') }}">
                @csrf
                
                <div class="mb-3">
                    <label for="fullname" class="form-label">full Name</label>
                    <input value="{{ old('fullname') }}" 
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
                    <input value="{{ old('id') }}" 
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
                        <option value="male" {{ old('gender') == 'male' ? 'selected':'' }}>Male</option>
                        <option value="female" {{ old('gender') == 'female' ? 'selected':'' }}>Female</option>
                    </select>

                    @if ($errors->has('gender'))
                        <span class="text-danger text-left">{{ $errors->first('gender') }}</span>
                    @endif
                </div>

                <hr />

                <h2>student Enrollments</h2>
                
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="school" class="form-label">school</label>
                        <select class="form-control form-select" name="school" id="school"  required>
                            <option>select student school</option>
                            @foreach ($branches as $branche)
                            <option value="{{$branche->id}}" {{ old('school') == $branche->id ? 'selected':'' }}>{{$branche->title}}</option>
                            @endforeach
                        </select>
    
                        @if ($errors->has('school'))
                            <span class="text-danger text-left">{{ $errors->first('school') }}</span>
                        @endif
                    </div>
    
                    <div class="col-md-3">
                        <label for="stage" class="form-label">stage</label>
                        <select disabled class="form-control form-select" name="stage" id="stage"  required>
                            <option>select student stage</option>
                            
                        </select>
    
                        @if ($errors->has('stage'))
                            <span class="text-danger text-left">{{ $errors->first('stage') }}</span>
                        @endif
                    </div>

                    <div class="col-md-3">
                        <label for="fees" class="form-label">Educational fees</label>
                        <input value="{{ old('fees') }}" 
                        type="number" 
                        class="form-control" 
                        name="fees" 
                        placeholder="Educational fees" autocomplete="off">
                        @if ($errors->has('fees'))
                            <span class="text-danger text-left">{{ $errors->first('fees') }}</span>
                        @endif
                    </div>

                    <div class="col-md-3">
                        <label for="type" class="form-label">Expense type</label>
                        <select class="form-select" name="type" id="type" required>
                            <option selected disabled value="">@lang('dashboard.choose')</option>
                            <option value="تأمين">Share</option>
                            <option value="مصروفات دراسية">All expenses</option>
                            <option value="قسط الاول">1st expense</option>
                            <option value="قسط ثانى">2nd expense</option>
                        </select>
                        @if ($errors->has('type'))
                            <span class="text-danger text-left">{{ $errors->first('type') }}</span>
                        @endif
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Save Branch</button>
                <a href="{{ route('students.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection

@section('js')
    <script src="{{ asset('js/Api/Stage/getSpecificStage.js') }}"></script>
@endsection