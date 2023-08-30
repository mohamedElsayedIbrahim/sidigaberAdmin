
@extends('layouts.app')

@section('title')
    App | users responsibilities
@endsection

@section('header')
    @include('layouts.header')
@endsection

@section('content')

<div class="navigation">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route("app.board")}}">@lang('site.home')</a></li>
          <li class="breadcrumb-item"><a href="{{route("responsibilities.index")}}">@lang('dashboard.studentFile')</a></li>
          <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.studentInfo')</li>
        </ol>
    </nav>
</div>

<x-alert></x-alert>

    <div class="bg-light p-4 rounded">
        <h1>Add new users responsibilities</h1>
        <div class="lead">
            Add new users responsibilities and assign role.
        </div>

        <div class="container mt-4">
            <form method="POST" action="">
                @csrf
                
                <div class="col-md-4">
                    <label for="user" class="form-label">user</label>
                    <select class="form-control" name="user" id="user"  required>
                        <option value="">select student user</option>
                        @foreach ($users as $user)
                        <option value="{{$user->id}}" {{ old('user') == $user->id ? 'selected':'' }}>{{$user->name}}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('school'))
                        <span class="text-danger text-left">{{ $errors->first('school') }}</span>
                    @endif
                </div>

                <hr />

                <h2>School responsibilities</h2>
                <button class="btn btn-dark" type="button" id="addBranch"> <i class="fa fa-plus" aria-hidden="true"></i> Add School</button>
                
                <table class="table">
                    <thead>
                        <th>School</th>
                        <th>Action</th>
                    </thead>
                    <tbody id="content">

                    </tbody>
                </table>


                <button type="submit" class="btn btn-primary">Save users responsibilities</button>
                <a href="{{ route('students.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection

@section('js')
    <script src="{{ asset('js/Api/responsibilities/branches.js') }}"></script>
@endsection