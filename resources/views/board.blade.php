@extends('layouts.app')

@section('title')
    App Board
@endsection

@section('header')
    @include('layouts.header')
@endsection

@section('content')

<div class="row">
    <div class="col-md-3">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">student payment</h5>
              <h6 class="card-subtitle mb-2 text-muted">this feature for know how upload the bank transaction</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="card-link">Card link</a>
            </div>
          </div>
    </div>

</div>



@endsection