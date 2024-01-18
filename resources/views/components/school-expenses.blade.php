
  
  <!-- Modal -->
  <div class="modal fade" id="schoolExpenses" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">@lang('dashboard.pay.bus')</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
            <form action="{{ route('expenses.school') }}" class="row g-3 needs-validation" novalidate method="POST">

                @csrf

                <div class="col-md-6">
                    <label for="academicYearListSchool" class="form-label text-capitalize">@lang('dashboard.academicyears.index')</label>
                    <select class="form-select" name="yearSchool" id="academicYearListSchool" required>
                      <option selected disabled value="">@lang('dashboard.choose')</option>
                    </select>
                    <div class="invalid-feedback">
                      Please select a valid state.
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="expensesType" class="form-label text-capitalize">@lang('dashboard.academicyears.index')</label>
                    <select class="form-select" name="type" id="expensesType" required>
                        <option selected disabled value="">@lang('dashboard.choose')</option>
                        <option value="مصروفات دراسية">All expenses</option>
                        <option value="قسط الاول">1st expense</option>
                        <option value="قسط ثانى">2nd expense</option>
                    </select>
                    <div class="invalid-feedback">
                      Please select a valid Type.
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="validationCustom0811" class="form-label">Expenses</label>
                    <input type="number" name="expense" class="form-control" id="validationCustom0811" required>
                    <div class="invalid-feedback">
                      Please provide a valid Expenses.
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