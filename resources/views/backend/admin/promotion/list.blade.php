   <div class="row justify-content-md-center">
            <div class="col-md-4 mt-2">
                <div class="card text-white bg-secondary">
                    <div class="card-body">
                        <div class="toll-free-box text-center">
                            <h4> <i class="mdi mdi-chart-bar-stacked"></i> Promote Student</h4>
                            <h5>Class From : Name To : Name</h5>
                            <h5>Session From : Name to : Name</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 mb-3 mb-lg-0">
                <div class="table-responsive-sm">
                    <table class="table table-bordered table-striped dt-responsive nowrap" width="100%">
                        <thead class="thead-dark">
                        <tr>
                            <th>Image</th>
                            <th>Section Name</th>
                            <th>Section</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                              <tr>
                                  <td class="text-center">
                                    <img src="#" height="50" alt=""><br>
                                  </td>
                                  <td>
                                    Student Name
                                    <br>
                                    <small><b>Stdent Code:</b>Code</small>
                                  </td>
                                  <td>
                                    Name
                                  </td>
                                  <td style="text-align: center;">
                                      <span class="badge badge-info-lighten" id = "success_#" style="display: none;">Promoted</span>
                                      <span class="badge bg-secondary"  id = "danger_#">Not Promoted Yet</span>
                                  </td>
                                  <td style="text-align: center;">
                                      <button type="button" class="btn btn-icon btn-success btn-sm" onclick="enrollStudent('#', '#')"> Enroll to <strong> Name </strong> </button>
                                      <button type="button" class="btn btn-icon btn-secondary btn-sm" onclick="enrollStudent('#', '#')"> Enroll to <strong> Name </strong> </button>
                                  </td>
                              </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@include('backend.admin.empty')