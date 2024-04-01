@section('navigation')

            <!-- SIDEBAR -->
<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu leftside-menu-detached">

  <div class="leftbar-user">
    <a href="javascript: void(0);">
      <img src="https://cohasbepanda.com/uploads/users/placeholder.jpg" alt="user-image" height="42" class="rounded-circle shadow-sm">
            <span class="leftbar-user-name">Co.H.A.S</span>
    </a>
  </div>
  <!--- Sidemenu -->
  <ul class="side-nav">
    <li class="side-nav-title side-nav-item py-2">Navigation</li>
    <li class="side-nav-item">
      <a href="{{route('home')}}" class="side-nav-link py-2">
        <i class="dripicons-meter"></i>
        <span> Dashboard </span>
      </a>
    </li>

    <li class="side-nav-item">          <a href="{{route('admission')}}" class="side-nav-link">
            <i class="dripicons-graduation"></i>
            <span>Online admission</span>
                          <span class="badge bg-danger float-end">0</span>
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
                                    <a href="https://cohasbepanda.com/superadmin/admin">Admin</a>
                </li>
                                          <li>
                                    <a href="https://cohasbepanda.com/superadmin/student">Student</a>
                </li>
                                          <li>
                                    <a href="https://cohasbepanda.com/superadmin/student/create">Admission</a>
                </li>
                                          <li>
                                    <a href="https://cohasbepanda.com/superadmin/teacher">Teacher</a>
                </li>
                                          <li>
                                    <a href="https://cohasbepanda.com/superadmin/permission">Teacher permission</a>
                </li>
                                          <li>
                                    <a href="https://cohasbepanda.com/superadmin/parent">Parent</a>
                </li>
                                          <li>
                                    <a href="https://cohasbepanda.com/superadmin/accountant">Accountant</a>
                </li>
                                          <li>
                                    <a href="https://cohasbepanda.com/superadmin/librarian">Librarian</a>
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
                                    <a href="https://cohasbepanda.com/superadmin/attendance">Daily attendance</a>
                </li>
                                          <li>
                                    <a href="https://cohasbepanda.com/superadmin/routine">Class routine</a>
                </li>
                                          <li>
                                    <a href="https://cohasbepanda.com/superadmin/subject">Subject</a>
                </li>
                                          <li>
                                    <a href="https://cohasbepanda.com/superadmin/syllabus">Syllabus</a>
                </li>
                                          <li>
                                    <a href="https://cohasbepanda.com/superadmin/manage_class">Class</a>
                </li>
                                          <li>
                                    <a href="https://cohasbepanda.com/superadmin/class_room">Class room</a>
                </li>
                                          <li>
                                    <a href="https://cohasbepanda.com/superadmin/department">Department</a>
                </li>
                                          <li>
                                    <a href="https://cohasbepanda.com/superadmin/event_calendar">Event calender</a>
                </li>
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
                                    <a href="https://cohasbepanda.com/superadmin/mark">Marks</a>
                </li>
                                          <li>
                                    <a href="https://cohasbepanda.com/superadmin/exam">Exam</a>
                </li>
                                          <li>
                                    <a href="https://cohasbepanda.com/superadmin/grade">Grades</a>
                </li>
                                          <li>
                                    <a href="https://cohasbepanda.com/superadmin/promotion">Promotion</a>
                </li>
                                    </ul>
        </div>

        <li class="side-nav-item">        <a data-bs-toggle="collapse" href="#accounting" aria-expanded="false" aria-controls="accounting" class="side-nav-link py-2">
          <i class="dripicons-suitcase"></i>
          <span>Accounting</span>
          <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="accounting">
          <ul class="side-nav-second-level">
                                        <li>
                                    <a href="https://cohasbepanda.com/superadmin/invoice">Student fee manager</a>
                </li>
                                          <li>
                                    <a href="https://cohasbepanda.com/superadmin/expense_category">Expense category</a>
                </li>
                                          <li>
                                    <a href="https://cohasbepanda.com/superadmin/expense">Expense manager</a>
                </li>
                                    </ul>
        </div>

        <li class="side-nav-item">        <a data-bs-toggle="collapse" href="#back-office" aria-expanded="false" aria-controls="back-office" class="side-nav-link py-2">
          <i class="dripicons-archive"></i>
          <span>Back office</span>
          <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="back-office">
          <ul class="side-nav-second-level">
                                        <li class="side-nav-item">
                  <a data-bs-toggle="collapse" href="#library" aria-expanded="false" aria-controls="library">Library                    <span class="menu-arrow"></span>
                  </a>
                  <div class="collapse" id="library">
                    <ul class="side-nav-third-level">
                                              <li>
                                                    <a href="https://cohasbepanda.com/superadmin/book">Book list manager</a>
                        </li>
                                              <li>
                                                    <a href="https://cohasbepanda.com/superadmin/book_issue">Book issue report</a>
                        </li>
                                          </ul>
                  </div>
                </li>
                                          <li>
                                    <a href="https://cohasbepanda.com/superadmin/session_manager">Session manager</a>
                </li>
                                          <li>
                                    <a href="https://cohasbepanda.com/superadmin/addon_manager">Addon manager</a>
                </li>
                                          <li>
                                    <a href="https://cohasbepanda.com/superadmin/noticeboard">Noticeboard</a>
                </li>
                                    </ul>
        </div>

        <li class="side-nav-item">        <a data-bs-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="settings" class="side-nav-link py-2">
          <i class="dripicons-cutlery"></i>
          <span>Settings</span>
          <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="settings">
          <ul class="side-nav-second-level">
                                        <li>
                                    <a href="{{route('setting')}}">System settings</a>
                </li>
                                          <li>
                                    <a href="{{route('websiteSettings')}} ">Website settings</a>
                </li>
                                          <li>
                                    <a href="#">School settings</a>
                </li>
                                          <li>
                                    <a href="#">Payment settings</a>
                </li>
                                          <li>
                                    <a href="https://cohasbepanda.com/superadmin/about">About</a>
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