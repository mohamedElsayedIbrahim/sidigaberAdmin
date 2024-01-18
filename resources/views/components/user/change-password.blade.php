  
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">@lang('site.change.pass')</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            
          <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('change.password') }}">

            @csrf
            
            <div class="col-md-12">
                <label for="validationCustom03" class="form-label">password</label>
                <input type="password" name="password" class="form-control" id="validationCustom03" required>
                <div class="invalid-feedback">
                    Please provide a valid password.
                </div>
            </div>

            <div class="col-md-12">
                <label for="validationCustom0435" class="form-label">password confirmation</label>
                <input type="password" name="password_confirmation" class="form-control" id="validationCustom0435" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('site.modal.close')</button>
                <button type="submit" class="btn btn-primary">@lang('site.modal.save.change')</button>
              </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>