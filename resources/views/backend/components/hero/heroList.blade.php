

<div class="container">
    <br><h2 style="text-align: center">Hero Table</h2>
    <div style="text-align: right">
        <a href="{{ route('hero.form') }}" class="btn btn-info" style="margin-right: 10px;">+ Add Banner</a>
    </div><br><br>
    <div class="col-10 mx-auto">
        <div class="card">
          <div class="table-responsive">
            <table
    class="table table-vcenter table-mobile-md card-table">
              <thead>
                <tr>
                    <th>Sl</th>
                    <th>Image</th>
                    <th>Welcome title</th>
                  <th>Title</th>
                  <th class="w-1">Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($heros as $hero)


                <tr>
                    <tr>
                        <td data-label="Name" >{{ $hero->id }}</td>
                        <td data-label="Title" ><img height="100px" width="100px" src="{{ url('/public/uploads',$hero->image) }}" alt="brand"> </td>
                        <td data-label="Name" >{{ $hero->welcome_title }}</td>
                        <td data-label="Name" >{{ $hero->title}}</td>
                  <td>
                    <div class="btn-list flex-nowrap">
                      <a href="{{ route('hero.delete',$hero->id) }}" class="btn">
                        Delete
                      </a>
                      <div class="dropdown">
                        <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                          Actions
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a class="dropdown-item" href="#">
                            Action
                          </a>
                          <a class="dropdown-item" href="#">
                            Another action
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
