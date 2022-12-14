@extends('layouts.app')

@section('title')
    App | Student
@endsection

@section('header')
    @include('layouts.header')
@endsection

@section('content')

<div class="navigation">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route("app.board")}}">@lang('site.home')</a></li>
          <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.bankTitle')</li>
        </ol>
    </nav>
</div>

@if (count($students) == 0)
            <div class="bg-primary text-center p-5 text-white text-capitalize alert">
                @lang('site.nodata')
            </div>
            
            @else
            <table class="table table-striped table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th>National Number</th>
                        <th>Student name</th>
                        <th>Upload date & time</th>
                        <th>Recipt Image</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td scope="row">{{$loop->iteration}}</td>
                            <td>{{$student->ssn}}</td>
                            <td>{{$student->studentName}}</td>
                            <td>{{$student->updated_at}}</td>
                            <td><a href="https://app.sidigaber.org/upload/bank/{{$student->image_name}}" target="_blank">View image</a></td>
                            <td>
                               
                            </td>
                        </tr>
                        @endforeach
                        
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">Total Specializes: <strong>{{count($students)}}</strong></td>
                            <td>{{$students->render()}}</td>
                        </tr>
                    </tfoot>
            </table>
            
        @endif




@endsection