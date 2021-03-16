<div class="modal fade" id="addCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter Course Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/submit-course" method="post" autocomplete="off" enctype="multipart/form-data">
        @csrf
            <div class="row">
               <div class="col-lg-6"> 
                   <div class="form-group">
                       <label for="courseName">Course Name:</label>
                        <input type="text" class="form-control @error('courseName') is-invalid @enderror" name="courseName" value="{{old('courseName')}}"> 
                        @error('courseName')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6"> 
                   <div class="form-group">
                       <label for="price">Price:</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{old('price')}}" >
                        @error('price')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6"> 
                   <div class="form-group">
                       <label for="startDate">Start Date:</label>
                        <input type="date" class="form-control @error('startDate') is-invalid @enderror" name="startDate" value="{{old('startDate')}}" >
                        @error('startDate')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6"> 
                   <div class="form-group">
                       <label for="endDate">End Date:</label>
                        <input type="date" class="form-control @error('endDate') is-invalid @enderror" name="endDate" value="{{old('endDate')}}" >
                        @error('endDate')
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
                    <div class="col-lg-6"> 
                        <div class="form-group">
                            <label for="featured_image">Featured Image:</label>
                             <input type="file" class="form-control @error('featured_image') is-invalid @enderror" name="featured_image" value="{{old('featured_image')}}"> 
                             @error('courseName')
                                 <span class="invalid-feedback">{{$message}}</span>
                             @enderror
                         </div>
                     </div>
                    <button type="submit" class="btn btn-success btn-sm">Save changes</button>
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