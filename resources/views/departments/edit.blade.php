<div class="modal fade" id="editDepartment-{{$department->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Department Details:<strong class='text-success'>{{$department->courseName}}</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" autocomplete="off">
            @csrf 
            @method('PUT')
            <div class="row">
            
               <div class="col-lg-6"> 
                   <div class="form-group">
                       <label for="departmentName">Department Name:</label>
                        <input type="text" class="form-control @error('departmentName') is-invalid @enderror" name="departmentName" value="{{old('departmentName')}}"> 
                        @error('departmentName')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="col-lg-12"> 
                   <div class="form-group">
                       <label for="description">Description:</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" cols="10" rows="5">{{old('description')}}</textarea>
                        @error('description')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success btn-sm">Update changes</button>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm"  data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>