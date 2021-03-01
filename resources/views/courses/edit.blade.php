<div class="modal fade" id="editCourse-{{$courses->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Courses Details:<strong class='text-success'>{{$courses->courseName}}</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/course-update/{{$courses->id}}" method="post" autocomplete="off">
            @csrf 
            @method('PUT')
            <div class="row">
               <div class="col-lg-6"> 
                   <div class="form-group">
                       <label for="courseName">Course Name:</label>
                        <input type="text" class="form-control @error('courseName') is-invalid @enderror" name="courseName" value="{{$courses->courseName}}"> 
                        @error('courseName')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6"> 
                   <div class="form-group">
                       <label for="price">Price :</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$courses->price}}" >
                        @error('price')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6"> 
                   <div class="form-group">
                       <label for="startDate">Start Date :</label>
                        <input type="text" class="form-control @error('startDate') is-invalid @enderror" name="startDate" value="{{$courses->startDate}}" >
                        @error('startDate')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6"> 
                   <div class="form-group">
                       <label for="endDate">End Date :</label>
                        <input type="text" class="form-control @error('endDate') is-invalid @enderror" name="endDate" value="{{$courses->endDate}}" >
                        @error('endDate')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12"> 
                   <div class="form-group">
                       <label for="description">Description:</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" cols="10" rows="5">{{$courses->description}}</textarea>
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