<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
	<thead>
		<tr style="background-color: #313a46; color: #ababab;">
			<th>Name</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($classrooms as $classroom)
			<tr>
				<td>{{$classroom->name}}</td>
			</tr>
		@endforeach
	</tbody>
</table>