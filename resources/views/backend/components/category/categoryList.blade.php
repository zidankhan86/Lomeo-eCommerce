<style>
    img{
        height: 100px;
        width: 100px;
        border-radius: 50%;
    }
</style>

<div class="container">
    <br><h2 style="text-align: center">Category Table</h2>
    <div style="text-align: right">
        <a href="{{ route('category.form') }}" class="btn btn-info" style="margin-right: 10px;">+ Add Category</a>
    </div><br><br>
    <div class="col-10 mx-auto">
        <div class="card">
          <div class="table-responsive">
            <table
                class="table table-vcenter table-mobile-md card-table">
              <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                  <th>Category Type</th>


                  <th class="w-1">Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($categories as $category)


                <tr>
                    <tr>
                        <td data-label="id" >{{ $category->id }}</td>
                        <td data-label="img" ><img src="{{ url('/public/uploads/' , $category->image) }}" alt="Cagegory"> </td>
                        <td data-label="name" >{{ $category->name }} </td>



                  <td>
                    <div class="btn-list flex-nowrap">
                      <a href="{{route('category.edit',$category->id)}}" class="btn">
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
