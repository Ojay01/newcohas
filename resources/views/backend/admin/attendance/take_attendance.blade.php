<form method="POST" class="d-block ajaxForm responsive_media_query" action="#" style="min-width: 300px; max-width: 400px;">
@csrf
    <div class="form-group row">
        <div class="col-md-12">
            <label for="date_on_taking_attendance">Date</label>
            <input type="text" class="form-control date" id="date_on_taking_attendance" data-bs-toggle="date-picker" data-single-date-picker="true" name = "date" value="" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-12">
            <label  for="class_id_on_taking_attendance">Class</label>
            <select name="class_id" id="class_id_on_taking_attendance" class="form-control "   required>
                <option value="">Select a Class</option>
                    <option value="#">class Name</option>
            </select>
        </div>
    </div>

    <div class="form-group row mb-3">
        <div class="col-md-12" id = "section_content_2">
            <label for="section_id_on_taking_attendance">Section</label>
            <select name="section_id" id="section_id_on_taking_attendance" class="form-control " data-bs-toggle="select2" required >
                <option value="">Select a Section</option>
            </select>
        </div>
    </div>


    <div class="row" id = "student_content" style="margin-left: 2px;">
    </div>

    <div class='row'>
        <div class="form-group col-md-12" id="showStudentDiv">
            <a class="btn btn-block btn-secondary" onclick="getStudentList()" style="color: #fff;" disabled>Show Student List</a>
        </div>
    </div>
    <div class="form-group col-md-12 mt-4" id = "updateAttendanceDiv" style="display: none;">
        <button class="btn w-100 btn-primary" type="submit">Update Attendance</button>
    </div>
</form>

<script>
    $(".ajaxForm").validate({}); // Jquery form validation initialization
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, getDailtyAttendance);
    });

    $('document').ready(function(){
        $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#class_id_on_taking_attendance', '#section_id_on_taking_attendance']);

        $('#date_on_taking_attendance').change(function(){
            $('#showStudentDiv').show();
            $('#updateAttendanceDiv').hide();
            $('#student_content').hide();
        });
        $('#class_id_on_taking_attendance').change(function(){
            $('#showStudentDiv').show();
            $('#updateAttendanceDiv').hide();
            $('#student_content').hide();
        });
        $('#section_id_on_taking_attendance').change(function(){
            $('#showStudentDiv').show();
            $('#updateAttendanceDiv').hide();
            $('#student_content').hide();
        });
    });

    $('#date_on_taking_attendance').daterangepicker();

    function classWiseSectionOnTakingAttendance(classId) {
        $.ajax({
            url: "#",
            success: function(response){
                $('#section_id_on_taking_attendance').html(response);
            }
        });
    }

    function getStudentList() {
        var date = $('#date_on_taking_attendance').val();
        var class_id = $('#class_id_on_taking_attendance').val();
        var section_id = $('#section_id_on_taking_attendance').val();

        if(date != '' && class_id != '' && section_id != ''){
            $.ajax({
                type : 'POST',
                url : '#',
                data: {date : date, class_id : class_id, section_id : section_id},
                success : function(response) {
                    $('#student_content').show();
                    $('#student_content').html(response);
                    $('#showStudentDiv').hide();
                    $('#updateAttendanceDiv').show();
                }
            });
        }else{
            toastr.error('#');
        }
    }
</script>