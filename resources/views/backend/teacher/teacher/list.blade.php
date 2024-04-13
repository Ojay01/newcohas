
<table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
    <thead>
        <tr style="background-color: #313a46; color: #ababab;">
            <th>Image</th>
            <th>Name</th>
            <th>Department</th>
            <th>Designation</th>
        </tr>
    </thead>
    <tbody>
      @foreach($teachers as $teacher)
            <tr>
                <td>
                                    @if($teacher->user->profile_image)                
                <img class="rounded-circle" width="50" height="50" src="{{ asset('storage/app/public/profiles/' . $teacher->user->profile_image) }}">
                @else
                <img class="rounded-circle" width="50" height="50" src="{{ asset('/public/images/placeholder.jpg')}}">                
                @endif
                </td>
                <td>{{$teacher->user->name}}</td>
                <td>{{$teacher->department->name}}</td>
                <td>{{$teacher->designation}}</td>
            </tr>
       @endforeach
    </tbody>
</table>
