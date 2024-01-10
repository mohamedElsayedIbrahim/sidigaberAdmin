
@extends('layouts.app')

@section('title')
    App | @lang('dashboard.admission.index')
@endsection

@section('header')
    @include('layouts.header')
@endsection

@section('content')
    
<div class="navigation">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route("app.board")}}">@lang('site.home')</a></li>
          <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.admission.index')</li>
        </ol>
    </nav>
</div>

<div class="bg-light p-4 rounded">
    <h1>@lang('dashboard.admission.index')</h1>
    <div class="lead">
        Manage your admissions here.
    </div>
    <div>

    </div>
    
    <div class="mt-2">
        <x-alert></x-alert>
    </div>


    <div class="mt-2 border border-1 rounded-2 p-1">
        <h3 class="text-danger">Search...</h3>
        <form action="{{ route('filter.expense') }}" class="row g-3 needs-validation align-items-center" novalidate method="GET">
            <div class="col-md-3">
                <label for="validationCustom09" class="form-label">Student ID</label>
                <input
                        type="text"
                        class="form-control"
                        id="studentID"
                        aria-describedby="helpId"
                        placeholder="Student ID"
                    />
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
         <th>Student Name</th>
         <th>Student NID</th>
         <th>Birthday</th>
         <th>Age in 1 Oct</th>
         <th>Branch</th>
         <th>Date</th>
         <th width="3%" colspan="3">Action</th>
      </tr>
        <tbody>
            @foreach ($data['data']['data'] as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item['student_name_arabic']}}</td>
                    <td>{{$item['student_nid']}}</td>
                    <td>{{$item['student_bod']}}</td>
                    <td>day:{{$item['student_day']}}- month: {{$item['student_month']}}-year: {{$item['student_year']}}</td>
                    <td>{{$item['branch']}}</td>
                    <td>{{$item['created_at']}}</td>
                    <td><button class="btn btn-primary showBtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-app-id="{{$item['uuid']}}">show Appliction</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Student data</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h3 class="text-danger">Student Info</h3>
          <table class="table" id="student-table">
            
          </table>
          <h3 class="text-danger">Student father data</h3>
          <table class="table" id="father-table">
            
          </table>
          <h3 class="text-danger">Student mother data</h3>
          <table class="table" id="mother-table">
            
          </table>
          <h3 class="text-danger">Admission documents</h3>
          <table class="table" id="documents-table">
            
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
<script src="{{ asset('js/web/admission/index.js') }}"></script>
@endsection
