<div class="modal fade" id="viewStudent-{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Student Details:<strong class='text-success'>{{$student->studentName}}</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h5 class="modal-title" id="exampleModalLabel">Student Name:<strong class='text-primary'>{{$student->studentName}}</strong></h5>
      <h5 class="modal-title" id="exampleModalLabel">Phone Number:<strong class='text-primary'>{{$student->phoneNumber}}</strong></h5>
      <h5 class="modal-title" id="exampleModalLabel">Course Name:<strong class='text-primary'>{{$student->courses->courseName}}</strong></h5>
      <h5 class="modal-title" id="exampleModalLabel">Department Name:<strong class='text-primary'>{{$student->departments->departmentName}}</strong></h5>
      <h5 class="modal-title" id="exampleModalLabel">Created At:<strong class='text-primary'>{{$student->created_at->diffForHumans()}}</strong></h5>
      <h5 class="modal-title" id="exampleModalLabel">Created By:<strong class='text-primary'>{{$student->created_by}}</strong></h5>
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm"  data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

