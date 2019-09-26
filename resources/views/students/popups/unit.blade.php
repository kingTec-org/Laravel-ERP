<!-- Modal -->
<div class="modal fade" id="new-unit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="exampleModalLabel">Register Unit</h5>
      </div>
      <form action="{{ route('new.registerunit') }}" method="POST" id="registerunit">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="row">
            <input type="hidden" name="student_id" value="{{$st->student_id}}">
            <div class="col-sm-3">
              <label for="course">Unit</label>
              <select name="unit_id" id="unit_id" class="form-control">
                @forelse ($allunits as $units)
                  {{-- expr --}}
                  <option value="{{$units->unit_id}}">{{$units->unit_name}}</option>
                @empty
                  {{-- empty expr --}}
                  <option>0 units found for this program</option>
                @endforelse
              </select>
            </div>
            <div class="col-sm-3">
              <label for="course">Unit Academic Year</label>
              <select name="academic_id" id="academic_id" class="form-control" readonly>
                @foreach ($academics as $academic)
                {{-- expr --}}
                <option value="{{$academic->academic_id}}" {{ $student->academic_id==$academic->academic_id ? "selected" : "" }}>{{$academic->academic_name}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-sm-3">
              <label for="lecturer">Lecturer</label>
              <select name="lecturer_id" id="lecturer_id" class="form-control">
                @foreach ($lecturers as $lecturer)
                {{-- expr --}}
                <option value="{{$lecturer->lecturer_id}}">{{$lecturer->l_surname.' '.$lecturer->l_othernames }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-sm-3">
              <label for="courses">Course</label>
              <select name="course_id" id="course_id" class="form-control" readonly>
                <option value="{{$student->course_id}}">{{$student->course_name}}</option>
              </select>
            </div>

          </div>
          <div class="row">
            <div class="col-sm-3">
              <label for="colleges">College</label>
              <select name="college_id" id="college_id" class="form-control" readonly>
                <option value="{{$student->college_id}}">{{$student->college_name}}</option>
              </select>
            </div>
            <div class="col-sm-3">
              <label for="level_id">Level of Study</label>
              <select name="level_id" id="level_id" class="form-control" readonly>
                <option value="{{ $student->level_id }}">{{ $student->level_id }}</option>
              </select>
            </div>
            <div class="col-sm-3">
              <label for="ld">Current Session</label>
              <input type="text" class="form-control" placeholder="Level Description" value="{{ $student->description.' '.$student->s_description }}" readonly> 
            </div>
            <div class="col-sm-3">
              <label for="terms">Terms</label>
              <select name="term_id" id="term_id" class="form-control">
                @foreach ($terms as $term)
                {{-- expr --}}
                <option value="{{$term->term_id}}">{{$term->term_title}}</option>
                @endforeach
              </select>
            </div>


          </div>
          <div class="row">
            <div class="col-sm-3">
              <label for="u_cost">Unit Cost</label>
              <input type="text" name="u_cost" id="u_cost" class="form-control" placeholder="Unit Cost"> 
            </div>
            <div class="col-sm-3">
              <label for="m_assignment">Assignment Marks</label>
              <input type="number" name="m_assignment" max="30" min="0" id="m_assignment" class="form-control" placeholder="Assignment Marks" required> 
            </div>
            <div class="col-sm-3">
              <label for="m_cat">CAT Marks</label>
              <input type="number" name="m_cat" id="m_cat" max="30" min="0" class="form-control" placeholder="CAT Marks" required> 
            </div> 
            <div class="col-sm-3">
              <label for="m_exam">Exam Marks</label>
              <input type="number" name="m_exam" id="m_exam" max="70" min="0" class="form-control" placeholder="Exam Marks" required> 
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          @if($allunits->count()!=0)
          <button type="button" onclick="processMarks()" id="save-unit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
          @endif
        </div>
      </form>
    </div>
  </div>
</div>
@push('bottom')
  <script type="text/javascript">
    function processMarks() {
      assignment = $('#m_assignment').val()
      cat = $('#m_cat').val()
      exam = $('#m_exam').val()
      if(assignment == "") 
      {
        swal('Assignment marks are required','','warning')
      }
      if(cat == "") 
      {
        swal('CAT marks are required','','warning')
      }
      if(exam == "") 
      {
        swal('Exams marks are required','','warning')
      }

      if(assignment > 30)
      {
        swal('Assignment marks cannot be greater than 30','','error')
      }

      if(cat > 30)
      {
        swal('CAT marks cannot be greater than 30','','error')
      }

      if(exam > 70)
      {
        swal('Exams marks cannot be greater than 70','','error')
      }
      
      data = $('#registerunit').serialize()
      action = $('#registerunit').attr('action')
      $.post(action, data, function(data) {
        $('#marks').load(location.href + ' #marks>*','')
        $('#registerunit').trigger('reset')
        $('#new-unit-modal').load(location.href + ' #new-unit-modal>*','')
      });

    }
  </script>
@endpush