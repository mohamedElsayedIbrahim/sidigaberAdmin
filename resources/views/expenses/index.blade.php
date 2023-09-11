
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
          <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.expenses.index')</li>
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

    <div class="mt-2 border border-1 rounded-2 p-1">
        <h3 class="text-danger">Search...</h3>
        <form action="{{ route('filter.expense') }}" class="row g-3 needs-validation align-items-center" novalidate method="GET">
            <div class="col-md-3">
                <label for="validationCustom04" class="form-label">File Status</label>
                <select class="form-select" name="upload_file" id="validationCustom04" required>
                  <option selected disabled value="">Choose...</option>
                  <option {{request()->get('upload_file') == 'true' ? 'selected':''}} value="true">Uploaded File</option>
                  <option {{request()->get('upload_file') == 'false' ? 'selected':''}}value="false">Not Uploaded File</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid state.
                </div>
            </div>

            <div class="col-md-12">
                <button class="btn btn-outline-dark" type="submit">Search</button>
            </div>
        </form>
    </div>
    </div>
    <table class="table table-bordered">
      <tr>
         <th width="1%">No</th>
         <th>Name</th>
         <th>School</th>
         <th>Type</th>
         <th>Paied status</th>
         <th>Upload Reciept</th>
         <th>Date</th>
         <th width="3%" colspan="3">Action</th>
      </tr>
        @foreach ($expenses as $expense)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $expense->student_enrollment->student->fullname }}</td>
            <td>{{ $expense->student_enrollment->branch->title }}</td>
            <td>{{ $expense->type}}</td>
            <td>{{ $expense->pay  == '0' ? __('dashboard.pay.false'): __('dashboard.pay.true') }}</td>
            <td>{{ $expense->front  == null && $expense->back == null ? __('dashboard.upload.false'): __('dashboard.upload.true') }}</td>
            <td>{{ $expense->updated_at->format('d/m/Y H:i A') }}</td>
            <td>
                <button type="button" data-expence="{{$expense->id}}" class="btn btn-primary btn-sm btnshow" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    show
                </button>
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

<x-expense.show></x-expense.show>
@endsection

@section('js')
    <script type="module" src="{{ asset('js/Api/expenses/show.js') }}"></script>
@endsection
