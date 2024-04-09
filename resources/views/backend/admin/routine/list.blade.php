  <div style="overflow-x: auto;">
    <table class="table table-striped table-bordered table-centered mb-0">
        <tbody>
       @php
                // Sort the timetables array by starting hour
                $timetables = $timetables->sortBy('starting_hour');
            @endphp

          <tr>
                <td style="font-weight: bold; width : 100px;">Monday</td>
                 @foreach ($timetables as $timetable)
        @if ($timetable->day == "Monday")
                <td class="m-1 ">

                            <div class="btn-group text-start">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i>
                                	{{$timetable->subject->name}}
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i>
                                	{{$timetable->starting_hour}}:{{$timetable->starting_minute}} - {{$timetable->ending_hour}}:{{$timetable->ending_minute}}
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i>
                                	{{$timetable->teacher->user->name}}
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i>
                                	{{$timetable->room->name}}
                                	
                                </p>
                                <span class="caret"> </span>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" onclick="openeditRoutineModal()">Edit</a>
                                    <a class="dropdown-item" onclick="confirmModal('#', getFilteredClassRoutine)">Delete</a>
                                </div>
                            </div>

                </td>
                @endif
                @endforeach
            </tr>

            <tr>
                <td style="font-weight: bold; width : 100px;">Tuesday</td>
                 @foreach ($timetables as $timetable)
        @if ($timetable->day == "Tuesday")
                <td class="m-1">

                            <div class="btn-group text-start">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i>
                                	{{$timetable->subject->name}}
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i>
                                	{{$timetable->starting_hour}}:{{$timetable->starting_minute}} - {{$timetable->ending_hour}}:{{$timetable->ending_minute}}
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i>
                                	{{$timetable->teacher->user->name}}
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i>
                                	{{$timetable->room->name}}
                                	
                                </p>
                                <span class="caret"></span>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" onclick="openeditRoutineModal()">Edit</a>
                                    <a class="dropdown-item" onclick="confirmModal('#', getFilteredClassRoutine)">Delete</a>
                                </div>
                            </div>

                </td>
                @endif
                @endforeach
            </tr>
           <tr>
                <td style="font-weight: bold; width : 100px;">Wednesday</td>
                 @foreach ($timetables as $timetable)
        @if ($timetable->day == "Wednesday")
                <td class="m-1">

                            <div class="btn-group text-start">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i>
                                	{{$timetable->subject->name}}
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i>
                                	{{$timetable->starting_hour}}:{{$timetable->starting_minute}} - {{$timetable->ending_hour}}:{{$timetable->ending_minute}}
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i>
                                	{{$timetable->teacher->user->name}}
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i>
                                	{{$timetable->room->name}}
                                	
                                </p>
                                <span class="caret"></span>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" onclick="openeditRoutineModal()">Edit</a>
                                    <a class="dropdown-item" onclick="confirmModal('#', getFilteredClassRoutine)">Delete</a>
                                </div>
                            </div>

                </td>
                @endif
                @endforeach
            </tr>
            <tr>
                <td style="font-weight: bold; width : 100px;">Thurday</td>
                 @foreach ($timetables as $timetable)
        @if ($timetable->day == "Thurday")
                <td class="m-1">

                            <div class="btn-group text-start">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i>
                                	{{$timetable->subject->name}}
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i>
                                	{{$timetable->starting_hour}}:{{$timetable->starting_minute}} - {{$timetable->ending_hour}}:{{$timetable->ending_minute}}
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i>
                                	{{$timetable->teacher->user->name}}
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i>
                                	{{$timetable->room->name}}
                                	
                                </p>
                                <span class="caret"></span>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" onclick="openeditRoutineModal()">Edit</a>
                                    <a class="dropdown-item" onclick="confirmModal('#', getFilteredClassRoutine)">Delete</a>
                                </div>
                            </div>

                </td>
                @endif
                @endforeach
            </tr>
            <tr>
                <td style="font-weight: bold; width : 100px;">Friday</td>
                 @foreach ($timetables as $timetable)
        @if ($timetable->day == "Friday")
                <td class="m-1">

                            <div class="btn-group text-start">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i>
                                	{{$timetable->subject->name}}
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i>
                                	{{$timetable->starting_hour}}:{{$timetable->starting_minute}} - {{$timetable->ending_hour}}:{{$timetable->ending_minute}}
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i>
                                	{{$timetable->teacher->user->name}}
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i>
                                	{{$timetable->room->name}}
                                	
                                </p>
                                <span class="caret"></span>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" onclick="openeditRoutineModal()">Edit</a>
                                    <a class="dropdown-item" onclick="confirmModal('#', getFilteredClassRoutine)">Delete</a>
                                </div>
                            </div>

                </td>
                @endif
                @endforeach
            </tr>
            <tr>
                <td style="font-weight: bold; width : 100px;">Saturday</td>
                 @foreach ($timetables as $timetable)
        @if ($timetable->day == "Saturday")
                <td class="m-1">

                            <div class="btn-group text-start">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i>
                                	{{$timetable->subject->name}}
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i>
                                	{{$timetable->starting_hour}}:{{$timetable->starting_minute}} - {{$timetable->ending_hour}}:{{$timetable->ending_minute}}
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i>
                                	{{$timetable->teacher->user->name}}
                                </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i>
                                	{{$timetable->room->name}}
                                	
                                </p>
                                <span class="caret"></span>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" onclick="openeditRoutineModal()">Edit</a>
                                    <a class="dropdown-item" onclick="confirmModal('#', getFilteredClassRoutine)">Delete</a>
                                </div>
                            </div>

                </td>
                @endif
                @endforeach
            </tr>
        </tbody>
    </table>
</div>

<div class="modal fade mt-3" id="editRoutineModal" tabindex="-1" aria-labelledby="editRoutineModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editRoutineModalLabel">Edit Timetable</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('backend.admin.routine.edit') 
            </div>
        </div>
    </div>
</div>

<script>
    function openeditRoutineModal() {
        $('#editRoutineModal').modal('show');
    }
</script>

<style>
    .dropdown-toggle::after{
        display: none;
    }
</style>