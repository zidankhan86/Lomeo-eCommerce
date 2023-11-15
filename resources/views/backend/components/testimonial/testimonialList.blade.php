
<style>
    img{
        height: 100px;
        width: 100px;
        border-radius: 50%;
    }
</style>
<div class="container">
    <br><h2 style="text-align: center">Testimonial Table</h2>
    <div style="text-align: right">
        <a href="{{ route('testimonial.form') }}" class="btn btn-info" style="margin-right: 10px;">+ Add Testimonial</a>
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
                  <th>Position</th>
                  <th class="w-1">Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($testimonials as $comment)


                <tr>
                    <tr>
                        <td data-label="Name" >{{ $comment->id }}</td>
                        <td data-label="Title" ><img src="{{ url('/public/uploads',$comment->image) }}" alt="brand"> </td>
                        <td data-label="Name" >{{ $comment->name }}</td>
                        <td data-label="Name" >{{ $comment->position}}</td>
                  <td>
                    <div class="btn-list flex-nowrap">
                      <a href="{{ route('testimonial.edit',$comment->id) }}" class="btn">
                        Edit
                      </a>
                      <div class="dropdown">
                        <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                          Actions
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a class="dropdown-item" href="{{ route('testimonial.delete',$comment->id) }}">
                            Delete
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
