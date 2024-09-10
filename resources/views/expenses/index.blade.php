
@extends('layouts.app')

@section('title')
    App | Educational expenses
@endsection

@section('header')
    @include('layouts.header')
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/zoomist.min.css') }}"/>
    
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
    <div>
        <!-- Button trigger modal -->
<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#busExpenses">
    @lang('dashboard.pay.bus')
  </button>
  <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#schoolExpenses">
    @lang('dashboard.pay.school')
</button>

<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#busExpensesForAll">
    @lang('dashboard.pay.bus.all')
</button>

    </div>
    
    <div class="mt-2">
        <x-alert></x-alert>
    </div>

    <div class="mt-2 border border-1 rounded-2 p-1">
        <h3 class="text-danger">Search...</h3>
        <form action="{{ route('filter.expense') }}" class="row g-3 needs-validation align-items-center" novalidate method="GET">
            <div class="col-md-3">
                <label for="validationCustom010" class="form-label">File Status</label>
                <select class="form-select" name="upload_file" id="validationCustom010">
                  <option selected disabled value="">Choose...</option>
                  <option {{request()->get('upload_file') == 'true' ? 'selected':''}} value="true">Uploaded File</option>
                  <option {{request()->get('upload_file') == 'false' ? 'selected':''}}value="false">Not Uploaded File</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid state.
                </div>
            </div>

            <div class="col-md-3">
                <label for="validationCustom010" class="form-label">Academy Year</label>
                <select class="form-select" name="academic" id="validationCustom010">
                  <option selected disabled value="">Choose...</option>
                  @foreach ($academic as $item)
                  <option {{request()->get('academic') == $item->id ? 'selected':''}} value="{{$item->id}}">{{$item->year}}</option>
                      
                  @endforeach
                  </select>
                <div class="invalid-feedback">
                  Please select a valid state.
                </div>
            </div>

            <div class="col-md-3">
                <label for="validationCustom0911" class="form-label">Paied Status</label>
                <select class="form-select" name="paied_status" id="validationCustom0911">
                  <option selected disabled value="">Choose...</option>
                  <option {{request()->get('paied_status') == 'true' ? 'selected':''}} value="true">Paied</option>
                  <option {{request()->get('paied_status') == 'false' ? 'selected':''}}value="false">Not Paied</option>
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
         <th colspan="2">Type</th>
         <th>Paied status</th>
         <th>Upload Reciept</th>
         <th>Date</th>
         <th width="3%" colspan="3">Action</th>
      </tr>
      
        @foreach ($expenses as $expense)
        
            @if ((int)$expense->student_enrollment->academicyear_id === (int)$year['id'])
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $expense->student_enrollment->student->fullname }}</td>
                    <td>{{ $expense->student_enrollment->branch->title }}</td>
                    <td>{{ $expense->type}}</td>
                    <td>{{ $expense->depoisit}}</td>
                    <td>{{ $expense->pay  == '0' ? __('dashboard.pay.false'): __('dashboard.pay.true') }}</td>
                    <td>{{ $expense->front  == null && $expense->back == null ? __('dashboard.upload.false'): __('dashboard.upload.true') }}</td>
                    <td>{{ $expense->updated_at->format('d/m/Y H:i A') }}</td>
                    <td>
                        <button type="button" data-expence="{{$expense->id}}" class="btn btn-primary btn-sm btnshow" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            show
                        </button>

                        <button type="button" data-expence="{{$expense->id}}" class="btn btn-warning btn-sm btnedit" data-bs-toggle="modal" data-bs-target="#exampleModalEdit">
                            Edit
                        </button>
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm" href="{{ route('expenses.destroy', $expense->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
            @endif
        
        @endforeach
    </table>
</div>

<x-expense.edit></x-expense.edit>
<x-expense.show></x-expense.show>
<x-bus-expenses></x-bus-expenses>
<x-bus-for-all-students></x-bus-for-all-students>
<x-school-expenses></x-school-expenses>
@endsection

@section('js')        
    <script src="{{ asset('js/zoomist.min.js') }}"></script>
    <script type="module" src="{{ asset('js/Api/expenses/show.js') }}?v={{env('ASSETS_VERSION')}}"></script>
    <script type="module" src="{{ asset('js/Api/expenses/update.js') }}?v={{env('ASSETS_VERSION')}}"></script>
    <script src="{{ asset('js/web/expense.js') }}?v={{env('ASSETS_VERSION')}}"></script>
@endsection
