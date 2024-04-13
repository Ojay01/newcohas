@section('navigation')

            <!-- SIDEBAR -->
<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu leftside-menu-detached">

  <div class="leftbar-user">
    <a href="javascript: void(0);">
     @if(Auth::user()->profile_image)
      <img src="{{ asset('storage/app/public/profiles/' . Auth::user()->profile_image) }}" alt="user-image" height="42" class="rounded-circle shadow-sm">
     @else
      <img src="https://cohasbepanda.com/uploads/users/placeholder.jpg" alt="user-image" height="42" class="rounded-circle shadow-sm">
      @endif
            <span class="leftbar-user-name">{{ Auth::user()->name }}</span>
    </a>
  </div>
  <!--- Sidemenu -->
  <ul class="side-nav">
    <li class="side-nav-title side-nav-item py-2">Navigation</li>
    <li class="side-nav-item">
      <a href="{{route('teacher')}}" class="side-nav-link py-2">
        <i class="dripicons-meter"></i>
        <span> Dashboard </span>
      </a>
    </li>

    <li class="side-nav-item">          <a href="{{route('teacher.assignments')}}" class="side-nav-link">
            <i class="dripicons-home"></i>
            <span>Assignments</span>
                          
                      </a>
        </li>

    <li class="side-nav-item">          <a href="{{route('teacher.tutorials')}}" class="side-nav-link">
            <i class="dripicons-bookmark"></i>
            <span> Tutorials</span>
                          
                      </a>
        </li>
      <li class="side-nav-item">        <a data-bs-toggle="collapse" href="#users" aria-expanded="false" aria-controls="users" class="side-nav-link py-2">
          <i class="dripicons-user"></i>
          <span>Users</span>
          <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="users">
          <ul class="side-nav-second-level">
                       
                                          <li>
                                    <a href="{{route('students')}}">Student</a>
                </li>
                       
                                          <li>
                                    <a href="{{ route('teacher.teachers') }}">Teachers</a>
                </li>
                                          
                                    </ul>
        </div>

        <li class="side-nav-item">        <a data-bs-toggle="collapse" href="#academic" aria-expanded="false" aria-controls="academic" class="side-nav-link py-2">
          <i class="dripicons-store"></i>
          <span>Academic</span>
          <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="academic">
          <ul class="side-nav-second-level">
                                       
                                          <li>
                                    <a href="{{route('routine')}}">Class Routine / Timetable</a>
                </li>
                                          <li>
                                    <a href="{{route('teacher.subjects')}}">Subjects</a>
                </li>
                                          {{--<li>
                                    <a href="{{route('syllabus')}}">Syllabus</a>
                </li>--}}
                                          <li>
                                    <a href="{{route('teacher.classes')}}">Classes</a>
                </li>
                                          <li>
                                    <a href="{{route('teacher.classroom')}}">Class rooms</a>
                </li>
                                         
                                         {{-- <li>
                                    <a href="{{route('eventCalender')}}">Event calender</a>
                </li>--}}
                        
                                         
                                    </ul>
        </div>

        <li class="side-nav-item">        <a data-bs-toggle="collapse" href="#exam" aria-expanded="false" aria-controls="exam" class="side-nav-link py-2">
          <i class="dripicons-to-do"></i>
          <span>Exam</span>
          <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="exam">
          <ul class="side-nav-second-level">
                                        <li>
                                    <a href="{{route('admin.marks')}}">Marks</a>
                </li>
                                          <li>
                                    <a href="{{route('teacher.exams')}}">Exam</a>
                </li>
                                          
                                    </ul>
        </div>

       

        

          </ul>
  <!-- End Sidebar -->

  <div class="clearfix"></div>
  <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->

@endsection