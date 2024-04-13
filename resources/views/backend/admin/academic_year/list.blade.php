
<div class="col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 mt-1">
                    <div class="alert alert-info" role="alert">
                    Active Academic Year
                        <span class="badge bg-success pt-1" id="active_session"> @foreach($academicyears as $academicyear)
        @if($academicyear->status == 1)
            {{$academicyear->name}}
        @endif
    @endforeach</span>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <select class="form-control select2" data-bs-toggle="select2" id = "session_dropdown">
                        <option value = "">Select Academic</option>
                    @foreach ($academicyears as $academicyear)
                        <option value="{{$academicyear->id}}" @if($academicyear->status == 1 ) selected @endif">{{$academicyear->name}}</option>
                        @endforeach
                </select>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12" style="float: left;">
                <button type="button" class="btn btn-icon btn-secondary" onclick="makeSessionActive()"> <i class="mdi mdi-check"></i>Activate</button>
            </div>
        </div>
    </div>
</div>
</div>
<div class="col-md-6">
    <div class="card">
        <div class="card-body">
            <table id="basic-table" class="table table-striped table-responsive-sm nowrap" width="100%">
                <thead>
                    <tr style="background-color: #313a46; color: #ababab;">
                        <th>Academic Year</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="table_body">
                    @foreach ($academicyears as $academicyear)
                    <tr>
                        <td>{{$academicyear->name}}</td>
                        <td>
                        @if ($academicyear->status == 1)
                                <i class="mdi mdi-circle text-success">Active</i>
                            @else
                                <i class="mdi mdi-circle text-dark">InActive</i>
                        @endif
                        </td>
                        <!--td>
                            <div class="dropdown text-center">
                                <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item->
                                    <a href="javascript:void(0);" class="dropdown-item" onclick="rightModal">Edit</a>

                                    <!-- item->
                                    
                                        <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('', showAllSessions)">Delete</a>
                                </div>
                            </div>
                        </td-->
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>

<script>
    function makeSessionActive() {
        var selectedSessionId = $('#session_dropdown').val();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "{{route('update.academic.year.status')}} ",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken // Include CSRF token in headers
            },
            data: {
                id: selectedSessionId
            },
            success: function(response) {
                if (response.success) {
                    // Reload the page or update UI as needed
                } else {
                    // Handle error
                    location.reload(); // Reload the page

                }
            },
            error: function(xhr, status, error) {
                console.error('Error occurred while activating academic year:', error);
            }
        });
    }
</script>