<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
        <tr style="background-color: #313a46; color: #ababab;">
            <th>Subject</th>
            <th>EXCEL</th>
            <th>PDF</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($submittedSubjects as $subject)
        <tr>
            <td>{{ $subject->name }}</td>
            <td><a href="{{ route('admin.download.marks', ['exam_id' => $examId, 'class_id' => $classId, 'section_id' => $sectionId, 'subject_id' => $subject->subject_id, 'format' => 'excel']) }}" download>EXCEL <i class="mdi mdi-download"></i></a></td>
            <td><a href="{{ route('admin.download.marks', ['exam_id' => $examId, 'class_id' => $classId, 'section_id' => $sectionId, 'subject_id' => $subject->subject_id, 'format' => 'pdf']) }}" download>PDF <i class="mdi mdi-download"></i></a></td>
        </tr>
        @endforeach
    </tbody>
</table>