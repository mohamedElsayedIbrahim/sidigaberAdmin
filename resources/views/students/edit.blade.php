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
          <li class="breadcrumb-item"><a href="{{route("app.board")}}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Student Bus</li>
        </ol>
    </nav>
</div>


<form method="POST" action="{{route('app.student.update',$student->ssn)}}" class="row g-3 needs-validation" novalidate>
    
    @csrf

    <div class="col-md-12">
      <label for="validationCustom01" class="form-label">National Number</label>
      <input type="text" maxlength="14" minlength="14" name="ssn" value="{{old('ssn') ?? $student->ssn }}" class="form-control" id="validationCustom01" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>
    <div class="col-md-12">
      <label for="validationCustom02" class="form-label">Student name</label>
      <input type="text" class="form-control" minlength="3" maxlength="100" name="studentName" value="{{old('studentName') ?? $student->studentName }}" id="validationCustom02" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>
    
    <div class="col-12">
      <button class="btn btn-primary" type="submit">Save data</button>
      <a href="{{ route('app.student.info') }}" class="btn btn-light" type="button">back</a>
    </div>
  </form>
        
@endsection