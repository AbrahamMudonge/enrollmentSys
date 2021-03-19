<div class="modal fade" id="editUser-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User Details:<strong class='text-success'>{{$user->name}}</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('users.update',$user->id) }}" method="post" autocomplete="off">
            @csrf 
            @method('PUT')
            <div class="row">
            
               <div class="col-lg-6"> 
                   <div class="form-group">
                       <label for="name">User Name:</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}"> 
                        @error('name')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="col-lg-12"> 
                   <div class="form-group">
                       <label for="email">Email:</label>
                       <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}"> 
                        @error('email')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6"> 
                      <div class="form-group">
                          <label for="password">Password:</label>
                           <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ $user->password }}"> 
                           @error('password')
                               <span class="invalid-feedback">{{$message}}</span>
                           @enderror
                       </div>
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