
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
        <tr style="background-color: #313a46; color: #ababab;">
            <th>Name</th>
            <th>Sections</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($classes as $class)
            <tr>
                <td>{{$class->name}}</td>
                <td>
                    <ul>
                       @if ($class->sections ?? null)
                <ul>
                    @foreach ($class->sections as $section)
                    <li>{{ $section->name }}</li>
                    @endforeach
                </ul>
                @else
                No sections
                @endif
                    </ul>
                </td>
                
            </tr>
        @endforeach
    </tbody>
</table>
