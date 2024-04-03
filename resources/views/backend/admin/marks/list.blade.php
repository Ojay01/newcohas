<div class="row mb-3">
    <div class="col-md-4"></div>
    <div class="col-md-4 toll-free-box text-center text-white pb-2" style="background-color: #6c757d; border-radius: 10px;">
        <h4>Manage Marks</h4>
        <span>Class : Class Name</span><br>
        <span>Section : Section Name</span><br>
        <span>Subject : Subject Name</span>
    </div>
</div>

    <table class="table table-bordered table-responsive-sm" width="100%">
        <thead class="thead-dark">
            <tr>
                <th>Student Name</td>
                <th>Marks</td>
                <th>Action</td>
            </tr>
        </thead>
        <tbody>

                <tr>
                    <td>User Name</td>
                    <td><span id="grade-for-mark-#">Marks Obtained</span> </td>
                    <td class="text-center"><button class="btn btn-success" onclick="mark_update('#')"><i class="mdi mdi-checkbox-marked-circle"></i></button></td>
                </tr>

        </tbody>
    </table>

@include('backend.admin.empty')

<script>
    function mark_update(student_id){
        var class_id = '#';
        var section_id = '#';
        var subject_id = '#';
        var exam_id = '#';
        var mark = $('#mark-' + student_id).val();
        var comment = $('#comment-' + student_id).val();
        if(subject_id != ""){
            $.ajax({
                type : 'POST',
                url : '#',
                data : {student_id : student_id, class_id : class_id, section_id : section_id, subject_id : subject_id, exam_id : exam_id, mark : mark, comment : comment},
                success : function(response){
                    success_notify('#');
                }
            });
        }else{
            toastr.error('#');
        }
    }

    function get_grade(exam_mark, id){
        $.ajax({
            url : '#',
            success : function(response){
                $('#grade-for-'+id).text(response);
            }
        });
    }
</script>