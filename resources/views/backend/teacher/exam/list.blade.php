
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
        <tr style="background-color: #313a46; color: #ababab;">
            <th>Exam Name</th>
            <th>Starting Date</th>
            <th>Ending Date</th>
        </tr>
    </thead>
    <tbody>
	@foreach ($exams as $exam)
	<tr>
	    <td>{{$exam->name}}</td>
        <td>{{ \Carbon\Carbon::parse($exam->starting_date)->format('d F Y') }}</td>
	    <td>{{ \Carbon\Carbon::parse($exam->ending_date)->format('d F Y') }}</td>
	</tr>
    @endforeach
	</tbody>
</table>