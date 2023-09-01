
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
                    @if (in_array($student->studentEnrollments->last()->branch->id,$branches))
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $student->fullname }}</td>
                            <td>{{ $student->id }}</td>
                            <td>{{$student->studentEnrollments->last()->branch->title}}</td>
                            <td><a href="{{ route('students.show', $student->id) }}" class="btn btn-warning btn-sm">Show</a></td>
                            <td><a href="{{ route('students.edit', $student->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                            <td>
                                {!! Form::open(['method' => 'DELETE','route' => ['students.destroy', $student->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        <div class="d-flex">
            {!! $students->links() !!}
        </div>

    </div>

    <x-import-student-data></x-import-student-data>
@endsection