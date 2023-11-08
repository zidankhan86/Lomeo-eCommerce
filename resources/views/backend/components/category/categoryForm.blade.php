<br><br><div class="col-8 mx-auto">
    <form class="card" action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <br><br><h3 class="card-title" style="text-align: center"><strong>Add Category</strong> </h3><br><br>
        <div class="row row-cards">


            <div class="row">
                <div class="col-md-4">
                  <div class="mb-3">
                    <label class="form-label">Type Name</label>
                    <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Type Name">
                  </div>
                  @error('name')
                <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>

                <div class="col-md-4">
                  <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                  </div>
                  @error('image')
                <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>

                <div class="col-md-4">
                  <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" id="" class="form-control">
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                  </div>
                </div>
              </div>
        </div>
      </div>
      <div class="card-footer text-end">
        <button type="submit" class="btn btn-primary">+ Add</button>
      </div>
    </form>
  </div>
