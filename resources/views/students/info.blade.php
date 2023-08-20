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
          <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.studentInfo')</li>
        </ol>
    </nav>
</div>

<x-alert></x-alert>

@if (count($students) == 0)
            <div class="bg-primary text-center p-5 text-white text-capitalize alert">
                @lang('site.nodata')
            </div>
            
            @else
            <table class="table table-striped table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th>@lang('studentInfo.national')</th>
                        <th>@lang('studentInfo.student')</th>
                        <th>@lang('studentInfo.action')</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td scope="row">{{$loop->iteration}}</td>
                            <td>{{$student->ssn}}</td>
                            <td>{{$student->studentName}}</td>
                            <td><a href="{{ route('app.student.edit',$student->ssn) }}" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                            <td>
                               
                            </td>
                        </tr>
                        @endforeach
                        
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">@lang('studentInfo.total'): <strong>{{count($students)}}</strong></td>
                            <td>{{$students->render()}}</td>
                        </tr>
                    </tfoot>
            </table>
            
        @endif
        
@endsection