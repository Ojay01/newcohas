
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
  <thead>
    <tr style="background-color: #313a46; color: #ababab;">
      <th>Name</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
  @foreach($students as $student)
      <tr>
        
        <td>{{$student->user->name}}  </td>
        <td>
        @if($student->user->status == 1)
            <span class="badge bg-success">Active</span>
            @else
            <span class="badge bg-secondary">Deactivate</span>
            @endif
        </td>
      </tr>
      @endforeach
  </tbody>
</table>

<script type="text/javascript">
  initDataTable('basic-datatable');
</script>


<!-- Modals -->
@foreach($students as $student)


    <div class="modal fade mt-3" id="profileModal{{ $student->id }}" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Student Profile - {{$student->user->name}} </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('backend.admin.student.profile') 
            </div>
        </div>
    </div>
</div>


</div>
@endforeach
