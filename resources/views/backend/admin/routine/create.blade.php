<form method="POST" class="d-block ajaxForm" action="#" style="min-width: 300px;">
@csrf
    <div class="form-group row mb-2">
        <label for="class_id_on_routine_creation" class="col-md-3 col-form-label">Class</label>
        <div class="col-md-9">
            <select name="class_id" id="class_id_on_routine_creation" class="form-control "  required onchange="classWiseSectionForRoutineCreate(this.value)">
                <option value="">Select a Class</option>
                    <option value="#">Class Name</option>
            </select>
        </div>
    </div>

    <div class="form-group row mb-2">
        <label for="section_id_on_routine_creation" class="col-md-3 col-form-label">Sections</label>
        <div class="col-md-9">
            <select name="section_id" id = "section_id_on_routine_creation" class="form-control "   required>
                <option value="">Section</option>
            </select>
        </div>
    </div>

    <div class="form-group row mb-2">
        <label for="subject_id_on_routine_creation" class="col-md-3 col-form-label">Subject</label>
        <div class="col-md-9">
            <select name="subject_id" id = "subject_id_on_routine_creation" class="form-control "  required>
                <option value="">select a section</option>
            </select>
        </div>
    </div>

    <div class="form-group row mb-2">
        <label for="teacher" class="col-md-3 col-form-label">Teacher</label>
        <div class="col-md-9">
            <select name="teacher_id" id = "teacher_on_routine_creation" class="form-control "   required>
                <option value="">Assign Teacher</option>
                    <option value="#">User Name</option>
            </select>
        </div>
    </div>

    <div class="form-group row mb-2">
        <label for="class_room_id" class="col-md-3 col-form-label">Class Room</label>
        <div class="col-md-9">
            <select name="class_room_id" id = "class_room_id_on_routine_creation" class="form-control "   required>
                <option value="">Select Class Room</option>
                    <option value="#">Class Name</option>
            </select>
        </div>
    </div>

    <div class="form-group row mb-2">
        <label for="day" class="col-md-3 col-form-label">Day</label>
        <div class="col-md-9">
            <select name="day" id = "day_on_routine_creation" class="form-control "   required>
                <option value="">Select a day</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
            </select>
        </div>
    </div>

    <div class="form-group row mb-2">
        <label for="starting_hour" class="col-md-3 col-form-label">Starting Hour</label>
        <div class="col-md-9">
            <select name="starting_hour" id = "starting_hour_on_routine_creation" class="form-control "  required>
                <option value="">Starting Hour</option>
                <?php for($i = 0; $i <= 23; $i++){
                    if ($i < 12){
                        if ($i == 0){ ?>
                            <option value="<?php echo $i; ?>">12 AM</option>
                        <?php }else{ ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?> AM</option>
                        <?php } ?>
                    <?php }else{ ?>
                        <?php $j = $i - 12; ?>

                        <?php if ($j == 0){ ?>
                            <option value="<?php echo $i; ?>">12 PM</option>
                        <?php }else{ ?>
                            <option value="<?php echo $i; ?>"><?php echo $j; ?> PM</option>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="form-group row mb-2">
        <label for="starting_minute" class="col-md-3 col-form-label">Starting Minute</label>
        <div class="col-md-9">
            <select name="starting_minute" id = "starting_minute_on_routine_creation" class="form-control "   required>
                <option value="">Starting minute</option>
                <?php for($i = 0; $i <= 55; $i = $i+5){ ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="form-group row mb-2">
        <label for="ending_hour" class="col-md-3 col-form-label">Ending Hour</label>
        <div class="col-md-9">
            <select name="ending_hour" id = "ending_hour_on_routine_creation" class="form-control "   required>
                <option value="">Ending Hour</option>
                <?php for($i = 0; $i <= 23; $i++){
                    if ($i < 12){
                        if ($i == 0){ ?>
                            <option value="<?php echo $i; ?>">12 AM</option>
                        <?php }else{ ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?> AM</option>
                        <?php } ?>
                    <?php }else{ ?>
                        <?php $j = $i - 12; ?>

                        <?php if ($j == 0){ ?>
                            <option value="<?php echo $i; ?>">12 PM</option>
                        <?php }else{ ?>
                            <option value="<?php echo $i; ?>"><?php echo $j; ?> PM</option>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="form-group row mb-2">
        <label for="ending_minute" class="col-md-3 col-form-label">Ending Minute</label>
        <div class="col-md-9">
            <select name="ending_minute" id = "ending_minute_on_routine_creation" class="form-control "   required>
                <option value="">Ending minute</option>
                <?php for($i = 0; $i <= 55; $i = $i+5){ ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                     <?php } ?>
            </select>
        </div>
    </div>

    <div class="form-group  col-md-12">
        <button class="btn btn-block btn-primary" type="submit">Add Class Timetable</button>
    </div>
</form>


<script>
$(document).ready(function () {

    $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); 

});

$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, getFilteredClassRoutine);
});

function classWiseSectionForRoutineCreate(classId) {
    $.ajax({
        url: "#",
        success: function(response){
            $('#section_id_on_routine_creation').html(response);
            classWiseSubjectForRoutineCreate(classId);
        }
    });
}

function classWiseSubjectForRoutineCreate(classId) {
    $.ajax({
        url: "#",
        success: function(response){
            $('#subject_id_on_routine_creation').html(response);
        }
    });
}
</script>