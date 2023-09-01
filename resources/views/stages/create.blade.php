
@extends('layouts.app')

@section('title')
    App | stages
@endsection

@section('header')
    @include('layouts.header')
@endsection

@section('content')

<div class="navigation">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route("app.board")}}">@lang('site.home')</a></li>
          <li class="breadcrumb-item"><a href="{{route("stages.index")}}">@lang('dashboard.stages.index')</a></li>
          <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.studentInfo')</li>
        </ol>
    </nav>
</div>

<x-alert></x-alert>

    <div class="bg-light p-4 rounded">
        <h1>Add new stage</h1>
        <div class="lead">
            Add new stage and assign role.
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

                <label for="schools" class="form-label">Assign Branch</label>
                <table class="table table-striped">
                    <thead>
                        <th scope="col" width="1%"><input type="checkbox" name="all_school"></th>
                        <th scope="col" width="20%">Name</th> 
                    </thead>

                    @foreach($schools as $school)
                        <tr>
                            <td>
                                <input type="checkbox" 
                                name="school[{{ $school->title }}]"
                                value="{{ $school->id }}"
                                class='school'>
                            </td>
                            <td>{{ $school->title }}</td>
                        </tr>
                    @endforeach
                </table>

                <button type="submit" class="btn btn-primary">Save stage</button>
                <a href="{{ route('stages.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection