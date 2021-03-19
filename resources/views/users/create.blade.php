<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter User Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('users.store') }}" method="post" autocomplete="off">
        @csrf
            <div class="row">
              <div class="col-lg-6"> 
                <div class="form-group">
                    <label for="name">User Name:</label>
                     <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}"> 
                     @error('name')
                         <span class="invalid-feedback">{{$message}}</span>
                     @enderror
                 </div>
             </div>
             
             <div class="col-lg-12"> 
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}"> 
                     @error('email')
                         <span class="invalid-feedback">{{$message}}</span>
                     @enderror
                 </div>
                 <div class="col-lg-6"> 
                   <div class="form-group">
                       <label for="password">Password:</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{old('password')}}"> 
                        @error('password')
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