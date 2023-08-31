
@extends('layouts.app')

@section('title')
    App | Educational expenses
@endsection

@section('header')
    @include('layouts.header')
@endsection

@section('content')
    
<div class="navigation">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route("app.board")}}">@lang('site.home')</a></li>
          <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.expenses')</li>
        </ol>
    </nav>
</div>

<div class="bg-light p-4 rounded">
    <h1>Educational expenses</h1>
    <div class="lead">
        Manage your expenses here.
    </div>
    
    <div class="mt-2">
        <x-alert></x-alert>
    </div>

    <table class="table table-bordered">
      <tr>
         <th width="1%">No</th>
         <th>Name</th>
         <th>School</th>
         <th>paied status</th>
         <th width="3%" colspan="3">Action</th>
      </tr>
        @foreach ($expenses as $expense)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $expense->student_enrollment->student->fullname }}</td>
            <td>{{ $expense->student_enrollment->branch->title }}</td>
            <td>{{ $expense->pay  == '0' ? __('dashboard.pay.true'): __('dashboard.pay.false') }}</td>
            <td>
                <a class="btn btn-info btn-sm">Show</a>
            </td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('expenses.edit', $expense->id) }}">Edit</a>
            </td>
        </tr>
        @endforeach
    </table>

    <div class="d-flex">
        {!! $expenses->links() !!}
    </div>

</div>
@endsection
