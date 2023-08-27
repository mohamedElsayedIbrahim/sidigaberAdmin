
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
          <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.stages')</li>
        </ol>
    </nav>
</div>

    <div class="bg-light p-4 rounded">
        <h1>stages</h1>
        <div class="lead">
            Manage your stages here.
            <a href="{{ route('stages.create') }}" class="btn btn-primary btn-sm float-right">Add new stage</a>
        </div>
        
        <div class="mt-2">
            <x-alert></x-alert>
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" width="1%">#</th>
                <th scope="col" width="15%">stage title</th>
                <th scope="col" width="1%" colspan="3"></th>    
            </tr>
            </thead>
            <tbody>
                @foreach($stages as $stage)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $stage->title }}</td>
                        
                        <td><a href="{{ route('stages.show', $stage->id) }}" class="btn btn-warning btn-sm">Show</a></td>
                        <td><a href="{{ route('stages.edit', $stage->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                        <td>
                            {!! Form::open(['method' => 'DELETE','route' => ['stages.destroy', $stage->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex">
            {!! $stages->links() !!}
        </div>

    </div>
@endsection