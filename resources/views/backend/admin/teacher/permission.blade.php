<div class="row" style="min-width: 300px;">
    <div class="col-md-12">
        <h5 class="text-center">{{$teacher->user->name}}</h5>

        @if($teacherPermissions[$teacher->user_id] ->count() > 0)
        @foreach($teacherPermissions[$teacher->user_id] as $classSectionSubject)
                <table class="table table-hover table-centered table-bordered mb-0" style="margin-bottom: 50px !important; background-color: #FAFAFA;">
                    <tbody>
                        <tr>
                            <td>Class</td>
                            <td>
                                {{ $classSectionSubject->classes->name }}
                            </td>
                        </tr>
                        <tr>
                            <td>Section</td>
                            <td>
                                {{ $classSectionSubject->section->name }}
                            </td>
                        </tr>
                        <tr>
                            <td>Subject</td>
                            <td>
                                {{ $classSectionSubject->subject->name }}                                
                            </td>
                        </tr>
                        <tr>
                            <td>Marks</td>
                            <td>
                                <i class="mdi mdi-circle text-{{ $classSectionSubject->marks == 1 ? 'success' : 'danger' }}"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>Assignment</td>
                            <td>
                                <i class="mdi mdi-circle text-{{ $classSectionSubject->assignment == 1 ? 'success' : 'danger' }}"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>Tutorial</td>
                            <td>
                                <i class="mdi mdi-circle text-{{ $classSectionSubject->tutorial == 1 ? 'success' : 'danger' }}"></i>
                            </td>
                        </tr>
                      
                    </tbody>
                </table>
                        @endforeach
            @else
            <p class = "text-center">No Permission Assigned Yet</p>
            @endif
   
        <a href="{{route('teacherPermission')}} " class="btn btn-info btn-block">Update Permission</a>
    </div>
</div>