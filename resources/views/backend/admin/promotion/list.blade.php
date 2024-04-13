   <div class="row justify-content-md-center">
            <div class="col-md-4 mt-2">
                <div class="card text-white bg-secondary">
                    <div class="card-body">
                        <div class="toll-free-box text-center">
                            <h4> <i class="mdi mdi-chart-bar-stacked"></i> Promote Student</h4>
                            <h5>Class From : {{$classFromName}} - To : {{$classToName}}</h5>
                            <h5>Session From : {{$sessionFromName}} - To : {{$sessionToName}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 mb-3 mb-lg-0">
                <div class="table-responsive-sm">
                    <table class="table table-bordered table-striped dt-responsive nowrap" width="100%">
                        <thead class="thead-dark">
                        <tr>
                            <th>Image</th>
                            <th>Section Name</th>
                            <th>Section</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                              <tr>
                                  <td class="text-center">
                                    @if($student->user->profile_image)                
                <img class="rounded-circle" width="50" height="50" src="{{ asset('storage/app/public/profiles/' . $student->user->profile_image) }}">
                @else
                <img class="rounded-circle" width="50" height="50" src="{{ asset('/public/images/placeholder.jpg')}}">                
                @endif
                                  </td>
                                  <td>
                                    {{$student->user->name}}
                                    <br>
                                    <small><b>Student Code:</b> COH{{$student->user->id}}</small>
                                  </td>
                                  <td>
                                     {{$student->section->name}}
                                  </td>
                                  <td style="text-align: center;">
                                      <span class="badge badge-info-lighten" id = "success_#" style="display: none;">Promoted</span>
                                      <span class="badge bg-secondary"  id = "danger_#">Not Promoted Yet</span>
                                  </td>
                                  <td style="text-align: center;">
                                      <button type="button" class="btn btn-icon btn-success btn-sm" onclick="enrollStudent('#', '#')"> Enroll to <strong> {{$classToName}} </strong> </button>
                                      <button type="button" class="btn btn-icon btn-secondary btn-sm" onclick="enrollStudent('#', '#')"> Enroll from <strong> {{$student->class->name}} </strong> </button>
                                  </td>
                              </tr>
                              @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@include('backend.admin.empty')