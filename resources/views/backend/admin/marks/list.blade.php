<div class="row mb-3">
    <div class="col-md-4"></div>
    <div class="col-md-4 toll-free-box text-center text-white pb-2" style="background-color: #6c757d; border-radius: 10px;">
        <h4>Manage Marks</h4>
        <span>Class : {{$className}} </span><br>
        <span>Section : {{$sectionName}} </span><br>
        <span>Subject : {{$subjectName}} </span>
    </div>
</div>

<form id="marksForm" action="{{ route('teacher.submit.marks') }}" method="POST">
    @csrf
    <input type="hidden" name="exam_id" value="{{ $exam }}">
    <input type="hidden" name="subject_id" value="{{ $subject }}">
    <table class="table table-bordered table-responsive-sm" width="100%">
        <thead class="thead-dark">
            <tr>
                <th>Sudent Name</td>
                <th>Mark</td>
            </tr>
        </thead>
        <tbody>
            @foreach($studentsWithMarks as $marks)
            <tr>
                <td>{{ $marks['name'] }}</td>
                <td>
                    <input class="form-control {{ $marks['total_marks'] >= 10 ? 'text-success' : 'text-danger' }}" type="number" id="mark-{{ $marks['id'] }}" max="20" name="mark_obtained[{{ $marks['id'] }}]" placeholder="mark" min="0" step="any" value="{{ $marks['total_marks'] }}" required onchange="updateColor(this)" oninput="updateColor(this)">

                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-center">
        <button class="btn btn-success" onclick="submit_marks()">Submit</button>
    </div>
</form>


<script>
    function submitMarks() {
        document.getElementById('marksForm').submit();
    }

    function updateColor(input) {
        // Get the entered value
        var value = input.value;

        // Remove existing color classes
        input.classList.remove('text-success', 'text-danger');

        // Add color classes based on the entered value
        if (value >= 10) {
            input.classList.add('text-success');
        } else {
            input.classList.add('text-danger');
        }
    }
</script>