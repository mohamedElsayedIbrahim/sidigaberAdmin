<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Student file</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            
            <form enctype="multipart/form-data" action="{{ route('students.import') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label for="excelFile">File upload</label>
                    <input type="file" class="form-control" name="excel" id="excel">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('site.modal.close')</button>
                    <button type="submit" class="btn btn-primary">upload file</button>
                </div>

            </form>

            

        </div>
        
      </div>
    </div>
  </div>