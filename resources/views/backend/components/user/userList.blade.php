

<div class="container">
    <br><h2 style="text-align: center">User Table</h2>
    <div class="col-12">
        <div class="card">
          <div class="table-responsive">
            <table
    class="table table-vcenter table-mobile-md card-table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Role</th>
                  <th class="w-1"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($user as $user)


                <tr>
                  <td data-label="Name" >
                    <div class="d-flex py-1 align-items-center">
                      <span class="avatar me-2" style="background-image: url(./static/avatars/010m.jpg)"></span>
                      <div class="flex-fill">
                        <div class="font-weight-medium">{{ $user->name }}</div>
                        <div class="text-muted"><p href="#" class="text-reset">{{ $user->email }}</p></div>
                      </div>
                    </div>
                  </td>
                  <td data-label="Title" >
                    <div>{{ $user->phone }}</div>

                  </td>
                  <td class="text-muted" data-label="Role" >
                    User
                  </td>
                  <td>
                    <div class="btn-list flex-nowrap">

                      <div class="dropdown">
                        <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                          Actions
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a class="dropdown-item" href="#">
                            Block
                          </a>
                          <a class="dropdown-item" href="#">
                            Unblock
                          </a>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>

</div>
