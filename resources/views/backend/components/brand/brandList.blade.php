
<style>
    img{
        height: 100px;
        width: 100px;
        border-radius: 50%;
    }
</style>
<div class="container">
    <br><h2 style="text-align: center">Brand Table</h2>
    <div style="text-align: right">
        <a href="{{ route('brand.create') }}" class="btn btn-info" style="margin-right: 10px;">+ Add Brand</a>
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
                    <th>Name</th>
                  <th>Category Type</th>
                  <th class="w-1">Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($brands as $brand)


                <tr>
                    <tr>
                        <td data-label="Name" >{{ $brand->id }}</td>
                        <td data-label="Title" ><img src="{{ url('/public/uploads',$brand->image) }}" alt="brand"> </td>
                        <td data-label="Name" >{{ $brand->name }}</td>
                        <td data-label="Name" >{{ $brand->category->name }}</td>
                  <td>
                    <div class="btn-list flex-nowrap">
                      <a href="{{ route('brand.edit',$brand->id) }}" class="btn">
                        Edit
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
