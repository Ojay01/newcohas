
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
  <thead>
    <tr style="background-color: #313a46; color: #ababab;">
      <th>Photo</th>
      <th>Name</th>
      <th>Email</th>
      <th>Qualifications</th>
      <th>Options</th>
    </tr>
  </thead>
  <tbody>
    
      <tr>
        <td>
          <img class="rounded-circle" width="50" src="#">
        </td>
        <td>name</td>
        <td>email</td>
        <td><a href="#" download>Qualifications <i class="mdi mdi-download"></i></td>
        <td>
          <div class="dropdown text-center">
            <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="javascript:void(0);" class="dropdown-item"  onclick="largeModal('#', '#')">Profile</a>
              <!-- item-->
              <a href="javascript:;" onclick="rightModal('#', '#');" class="dropdown-item">Approve</a>
              <!-- item -->
              <a href="javascript:;" class="dropdown-item" onclick="confirmModalRedirect('#')">Delete</a>
            </div>
          </div>
        </td>
      </tr>
  </tbody>
</table>