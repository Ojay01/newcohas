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
                                
                            </div>

                </td>
                @endif
                @endforeach
            </tr>
        </tbody>
    </table>
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