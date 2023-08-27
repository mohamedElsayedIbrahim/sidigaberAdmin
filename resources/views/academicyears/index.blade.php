
@extends('layouts.app')

@section('title')
    App | academicyears
@endsection

@section('header')
    @include('layouts.header')
@endsection

@section('content')
    
<div class="navigation">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route("app.board")}}">@lang('site.home')</a></li>
          <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.academicyears')</li>
        </ol>
    </nav>
</div>

    <div class="bg-light p-4 rounded">
        <h1>academic years</h1>
        <div class="lead">
            Manage your academic years here.
            <a href="{{ route('academicyears.create') }}" class="btn btn-primary btn-sm float-right">Add new academic year</a>
        </div>
        
        <div class="mt-2">
            <x-alert></x-alert>
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" width="1%">#</th>
                <th scope="col" width="15%">Name</th>
                <th scope="col" width="1%" colspan="3"></th>    
            </tr>
            </thead>
            <tbody>
                @foreach($academicyears as $academicyear)
                
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $academicyear->year }}</td>
                        <td><a href="{{ route('academicyears.show', $academicyear->id) }}" class="btn btn-warning btn-sm">Show</a></td>
                        <td><a href="{{ route('academicyears.edit', $academicyear->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                        <td>
                            {!! Form::open(['method' => 'DELETE','route' => ['academicyears.destroy', $academicyear->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex">
            {!! $academicyears->links() !!}
        </div>

    </div>
@endsection