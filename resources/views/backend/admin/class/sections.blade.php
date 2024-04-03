
<form method="POST" class="d-block ajaxForm" action="#">
@csrf
            <div class="input-group me-2 mb-2">
                    <input type="hidden" class="form-control" id="section" name = "section_id[]" value="#">
                    <input type="text" class="form-control" id="name" name = "name[]" value="#" required>

                    <!-- <button class="btn btn-icon btn-danger" type="button" onclick="deleteSection(this)"><i class="mdi mdi-window-close"></i></button> -->
                    <button class="btn btn-icon btn-success" type="button" onclick="appendSection()"><i class="mdi mdi-plus"></i></button>
            </div>

            <div class="input-group me-2 mb-2" id="sectionDatabase#">
                    <input type="hidden" class="form-control" id="section#" name = "section_id[]" value="#">
                    <input type="text" class="form-control" name = "name[]" value="#" required>

                    <button class="btn btn-icon btn-danger" type="button" onclick="removeSectionDatabase('#')"><i class="mdi mdi-window-close"></i></button>
            </div>
    <div id = "section_area"></div>
    <div class="row no-gutters">
    <div class="form-group  col-md-12 p-0 mt-2">
        <button class="btn btn-block btn-primary ms-2" type="submit">Update</button>
    </div>
</div>
</form>

<!--div id = "blank_section">
    <div class="input-group me-2 mb-2">

            <input type="hidden" class="form-control" name = "section_id[]" value="0">
            <input type="text" class="form-control" name = "name[]" value="" required>

            <button class="btn btn-icon btn-danger" type="button" onclick="removeSection(this)"><i class="mdi mdi-window-close"></i></button>
    </div>
</div-->


<script>

//update form
 // Jquery form validation initialization
$(".ajaxForm").validate({});
$(".ajaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, showAllClasses);
});

var blank_section_field = $('#blank_section').html();

$(document).ready(function() {
    $('#blank_section').hide();
});


function appendSection() {
    $('#section_area').append(blank_section_field);
}

function removeSection(elem) {
    $(elem).closest('.input-group').remove();
}

function removeSectionDatabase(#) {
    $('#sectionDatabase'+section_id).hide();
    $('#section'+section_id).val(section_id+'delete');
}
</script>