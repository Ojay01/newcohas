
<form method="POST" class="d-block responsive_media_query" action="#">
@csrf

    <input type="hidden" name="student_id" value="#">
    
    <div class="form-group mb-3">
        <div class="col-md-12">
            <label  for="class_id_on_taking_attendance">Classes</label>
            <select name="class_id" id="class_id_on_taking_attendance" class="form-control select2" data-bs-toggle="select2" onchange="classWiseSectionOnTakingAttendance(this.value)" required>
                <option value="">Select Class</option>
               
                    <option value="<?php echo $class['id']; ?>">Class Name</option>
                
            </select>
        </div>
    </div>

    <div class="form-group row mb-3">
        <div class="col-md-12" id = "section_content_2">
            <label for="section_id_on_taking_attendance">Section</label>
            <select name="section_id" id="section_id_on_taking_attendance" class="form-control select2" data-bs-toggle="select2" required >
                <option value="">Select Section</option>
            </select>
        </div>
    </div>

    <div class="form-group col-md-12 mt-4">
        <button class="btn w-100 btn-primary" type="submit">Submit</button>
    </div>
</form>

<script type="text/javascript">
    function classWiseSectionOnTakingAttendance(classId) {
        $.ajax({
            url: "#",
            success: function(response){
                $('#section_id_on_taking_attendance').html(response);
            }
        });
    }
</script>