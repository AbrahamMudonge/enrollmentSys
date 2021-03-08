<div class="modal fade" id="viewDepartment-{{$department->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Department Details:<strong class='text-success'>{{$department->departmentName}}</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h5 class="modal-title" id="exampleModalLabel">Department Name:<strong class='text-primary'>{{$department->departmentName}}</strong></h5>
      <h5 class="modal-title" id="exampleModalLabel">Description:<strong class='text-primary'>{{$department->description}}</strong></h5>
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm"  data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

