
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
          <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.students.index')</li>
        </ol>
    </nav>
</div>

    <div class="bg-light p-4 rounded">
        <h1>students</h1>
        <div class="lead">
            Manage your students here.
            <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm float-right">Add new student</a>
            <!-- Button trigger modal -->
            <button type="button" class="btn-sm btn-warning btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Upload file 
            </button>
        </div>
        
        <div class="mt-2">
            <x-alert></x-alert>
        </div>

        <div class="mt-2 border border-1 rounded-2 p-1">
            <h3 class="text-danger">Search...</h3>
            <form action="{{ route('students.search') }}" class="row g-3 needs-validation align-items-center" novalidate method="GET">
                <div class="col-md-3">
                    <label for="validationCustom09" class="form-label">search Student</label>
                    <input type="text" id="validationCustom09" class="form-control" name="q">
                    <div class="invalid-feedback">
                      Please select a valid state.
                    </div>
                </div>

                <div class="col-md-12">
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                </div>
            </form>
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" width="1%">#</th>
                <th scope="col" width="15%">Name</th>
                <th scope="col" width="15%">National ID</th>
                <th scope="col" width="15%">School</th>
                <th scope="col" width="1%" colspan="3"></th>    
            </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $student->fullname }}</td>
                        <td>{{ $student->student_id }}</td>
                        <td>{{$student->title}}</td>
                        <td><a href="{{ route('students.show', $student->student_id) }}" class="btn btn-warning btn-sm">Show</a></td>
                        <td><a href="{{ route('students.edit', $student->student_id) }}" class="btn btn-info btn-sm">Edit</a></td>
                        <td>
                            {!! Form::open(['method' => 'DELETE','route' => ['students.destroy', $student->student_id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>

        <div class="d-flex">
            {!! $students->links() !!}
        </div>

    </div>

    <x-import-student-data></x-import-student-data>
@endsection