<br><br><div class="col-8 mx-auto">
    <form class="card" action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <br><br><h3 class="card-title" style="text-align: center"><strong>Add Brand</strong> </h3><br><br>
        <div class="row row-cards">


            <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Brand Name</label>
                    <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Type Name">
                  </div>
                  @error('name')
                <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>

                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                  </div>
                  @error('image')
                <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Choose Category</label>
                            <select name="category_id" class="form-control">

                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach



                            </select>
                        </div>
                        @error('category_id')
                <p class="text-danger">{{ $message }}</p>
                  @enderror
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
