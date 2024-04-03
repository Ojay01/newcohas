<form method="POST" class="d-block ajaxForm" action="#" enctype="multipart/form-data">
@csrf
    <div class="form-row">
        <div class="form-group col-md-12 mb-2">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name = "title" required>
        </div>
        <div class="form-group col-md-12 mb-2">
            <label for="class_id_on_create">Class</label>
            <select class="form-control "  id="class_id_on_create" name="class_id" onchange="classWiseSectionOnCreate(this.value)" required>
                <option value="">Select a Class</option>
                    <option value="#">Class Name</option>
            </select>
        </div>

        <div class="form-group col-md-12 mb-2">
            <label for="section_id_on_create">Section</label>
            <select class="form-control " id="section_id_on_create" name="section_id" required>
                <option value="">Select a Section </option>
            </select>
        </div>

        <div class="form-group col-md-12 mb-2">
            <label for="subject_id_on_create">Subject</label>
            <select class="form-control " id="subject_id_on_create" name="subject_id" requied>
                <option>Select Subject</option>
            </select>
        </div>
        <div class="form-group col-md-12 mb-2">
            <label for="syllabus_file">Upload Syllabus</label> <br>
            <div class="custom-file-upload d-inline-block">
                <input type="file" class="form-control" id="syllabus_file" name = "syllabus_file" required>
            </div>
        </div>
        <div class="form-group mb-1">
            <button class="btn btn-block btn-primary" type="submit">Create Syllabus</button>
        </div>
    </div>
</form>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, showAllSyllabuses);
});

$('document').ready(function(){
    $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); });
//     initSelect2(['#class_id_on_create',
//                 '#section_id_on_create',
//                 '#subject_id_on_create']);
});

function classWiseSectionOnCreate(classId) {
    $.ajax({
        url: "#",
        success: function(response){
            $('#section_id_on_create').html(response);
            classWiseSubjectOnCreate(classId);
        }
    });
}

function classWiseSubjectOnCreate(classId) {
    $.ajax({
        url: "#",
        success: function(response){
            $('#subject_id_on_create').html(response);
        }
    });
}
</script>


<script type="text/javascript">
  initCustomFileUploader();
</script>