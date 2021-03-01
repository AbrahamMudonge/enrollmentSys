<div class="modal fade" id="viewCourse-{{$courses->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Course Details:<strong class='text-success'>{{$courses->courseNames}}</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h5 class="modal-title" id="exampleModalLabel">Course Name:<strong class='text-primary'>{{$courses->courseName}}</strong></h5>
      <h5 class="modal-title" id="exampleModalLabel">Price:<strong class='text-primary'>{{$courses->price}}</strong></h5>
      <h5 class="modal-title" id="exampleModalLabel">Start Date:<strong class='text-primary'>{{$courses->startDate}}</strong></h5>
      <h5 class="modal-title" id="exampleModalLabel">End Date:<strong class='text-primary'>{{$courses->endDate}}</strong></h5>
      <h5 class="modal-title" id="exampleModalLabel">Description:<strong class='text-primary'>{{$courses->description}}</strong></h5>
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm"  data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

