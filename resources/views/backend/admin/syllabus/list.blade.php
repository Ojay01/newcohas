    <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
        <thead>
            <tr style="background-color: #313a46; color: #ababab;">
                <th>Title</th>
                <th>Syllabus</th>
                <th>Subject</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>Title</td>
                    <td><a href="#" class="btn btn-info mdi mdi-download" download>Download</a></td>
                    <td>Subject Name</td>
                    <td>
                        <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="confirmModal('#', showAllSyllabuses)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-original-title="Delete Syllabus"> <i class="mdi mdi-window-close"></i></button>
                    </td>
                </tr>
        </tbody>
    </table>
    @include('backend.admin.empty')