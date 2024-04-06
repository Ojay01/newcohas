
<div class="h-100">
    <div class="row align-items-center h-100">
        <div class="col-md-4 pb-2">
            <div class="text-center">
                <img class="rounded-circle" width="50" height="50" src="/public/images/placeholder.jpg">
                <br>
                <span style="font-weight: bold;">
                    Name: {{$student->user->name}}
                </span>
                <br>
                <span style="font-weight: bold;">
                    Student Code: COHAS{{$student->student_id}}ST
                </span>
            </div>
        </div>
        <div class="col-md-8">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="parent-tab" data-bs-toggle="tab" href="#parent_info" role="tab" aria-controls="parent_info" aria-selected="false">Parent Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="parent-tab" data-bs-toggle="tab" href="#exam_marks" role="tab" aria-controls="exam_marks" aria-selected="false">Exam Mark</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <table class="table table-centered mb-0">
                        <tbody>
                            <tr>
                                <td style="font-weight: bold;">Student:</td>
                                <td>{{$student->user->name}}</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Class:</td>
                                <td>
                                   {{$student->class->name}}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Section:</td>
                                <td>
                                    {{$student->section->name}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade show" id="parent_info" role="tabpanel" aria-labelledby="parent-tab">
                    <table class="table table-centered mb-0">
                        <tbody>
                            <tr>
                                <td style="font-weight: bold;">Parent Name:</td>
                                <td>
                                   parent name
                                </td>
                            </tr>
                            
                            <tr>
                                <td style="font-weight: bold;">Parent Number:</td>
                                <td>
                                    Phone
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade show table-responsive" id="exam_marks" role="tabpanel" aria-labelledby="parent-tab">
                    <table class="table table-centered mb-0">
                        <thead>
                            <tr>
                                <th>Exam</th>
                                <th>Subject</th>
                                <th>Mark</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                        <td rowspan="#" style="font-weight: bold;">exam Name</td>
                                    
                                    <td>Subject name</td>
                                    <td>Mark Obtain</td>
                                
                                </tr>
                                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>