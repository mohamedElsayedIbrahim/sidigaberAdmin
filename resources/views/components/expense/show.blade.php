 
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 75%;">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('dashboard.expenses.index')</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-8">
              <div>
                <h2 class="text-danger">Student information</h2>
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <th>Name</th>
                      <td>Mohamed Elsayed</td>
                    </tr>
    
                    <tr>
                      <th>National ID</th>
                      <td>1511515121212</td>
                    </tr>
    
                    <tr>
                      <th>Gender</th>
                      <td>Male</td>
                    </tr>
    
                  </tbody>
                </table>
              </div>
    
              <div>
                <h2 class="text-danger">School information</h2>
                <table class="table table-light table-striped">
                  <tbody>
                    <tr>
                      <th>School</th>
                      <td>Mohamed Elsayed</td>
                    </tr>
    
                    <tr>
                      <th>Stage</th>
                      <td>1511515121212</td>
                    </tr>
    
                    <tr>
                      <th>Year</th>
                      <td>1511515121212</td>
                    </tr>
    
                  </tbody>
                </table>
              </div>
    
              <div>
                <h2 class="text-danger">Fees information</h2>
                <table class="table table-light table-striped">
                  <tbody>
                    <tr>
                      <th>fees</th>
                      <td>Mohamed Elsayed</td>
                    </tr>
    
                    <tr>
                      <th>Status</th>
                      <td>1511515121212</td>
                    </tr>
    
                    <tr>
                      <th>Type</th>
                      <td>1511515121212</td>
                    </tr>
    
                    <tr>
                      <th>Date</th>
                      <td>1511515121212</td>
                    </tr>
    
                  </tbody>
                </table>
              </div>

            </div>

            <div class="col-md-4">
              <h2 class="text-danger">Upload Reciept</h2>
              <small class="text-capitalize">back face</small>
              <div><img src="" alt="recipt backface" class="w-100"></div>
              <small class="text-capitalize">front face</small>
              <div><img src="" alt="recipt backface" class="w-100"></div>

              <form id="formUpdate" method="POST" class="row g-3 needs-validation" novalidate>
                
                @csrf

                <div class="col-md-12 mb-3">
                  <label for="validationServer04" class="form-label">State</label>
                  <select class="form-select" name="paymentStatus" id="validationServer04" aria-describedby="validationServer04Feedback" required>
                    <option value="">Choose...</option>
                    <option value="paid">valid</option>
                    <option value="un-paid">invalid</option>
                  </select>
                  <div id="validationServer04Feedback" class="invalid-feedback">
                    Please select a valid paied status.
                  </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">save Data</button>
                </div>
              </form>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <form id="formUpdate" class="row w-100 needs-validation" method="POST" novalidate>
            @csrf
            <div class="col-md-12 mb-3">
              <label for="validationServer04" class="form-label">@lang('dashboard.paid')</label>
              <select class="form-select" name="paymentStatus" id="validationServer04" required>
                <option selected disabled value="">@lang('dashboard.choose')</option>
                <option value="paid">@lang('dashboard.paid.true')</option>
                <option value="un-paid">@lang('dashboard.paid.false')</option>
              </select>
              <div id="validationServer04Feedback" class="invalid-feedback">
                @lang('dashboard.paid.update')
              </div>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">@lang('site.modal.save')</button>
            </div>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('site.modal.close')</button>
        </div>
      </div>
    </div>
  </div>