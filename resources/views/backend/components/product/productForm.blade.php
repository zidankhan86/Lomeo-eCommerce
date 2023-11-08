
<div class="container"></div>

<br><br><div class="col-8 mx-auto">
    <form class="card" method="POST" action="{{ route('product') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <br><br><h3 class="card-title" style="text-align: center"><strong>Add Product</strong> </h3><br><br>
            <div class="row row-cards">
                <div class="col-md-5">
                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" value="{{ old('name') }}" class="form-control" name="name" placeholder="Product Name">
                    </div>
                    @error('name')
                <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" value="{{ old('price') }}" class="form-control" name="price" placeholder="Price">
                    </div>
                    @error('price')
                <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Select Thumbnail</label>
                        <input type="file" name="thumbnail"  class="form-control" name="image">
                    </div>
                    @error('thumbnail')
                <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category_id" id="" class="form-control">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                        </select>
                      </div>
                      @error('category_id')
                <p class="text-danger">{{ $message }}</p>
                  @enderror
                    </div>

                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label">Brand</label>
                        <select name="brand_id" id="" class="form-control">


                        @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach


                        </select>
                      </div>
                    </div>
                    @error('brand_id')
                    <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>


                <div class="row">
                    <div class="col-md-5">
                      <div class="mb-3">
                        <label class="form-label">Stock</label>
                        <input type="text" value="{{ old('stock') }}" class="form-control" name="stock" placeholder="Stock">
                      </div>
                      @error('stock')
                      <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-md-3">
                      <div class="mb-3">
                        <label class="form-label">Discount</label>
                        <input type="number" value="{{ old('discount') }}" class="form-control" name="discount" placeholder="Discount">
                      </div>
                      @error('discount')
                      <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-md-2">
                      <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="mb-3">
                        <label class="form-label">Featured</label>
                        <select name="featured" class="form-control">
                          <option value="1">True</option>
                          <option value="0">False</option>
                        </select>
                      </div>
                    </div>
                  </div>


                <div class="col-sm-6 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Long Description</label>
                        <textarea rows="5" value="{{ old('long_description') }}" name="long_description" id="editor" class="form-control" placeholder="Product Description"></textarea>
                    </div>
                    @error('long_description')
                    <p class="text-danger">{{ $message }}</p>
                      @enderror
                </div>

                <div class="col-sm-6 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Short Description</label>
                        <textarea rows="5" value="{{ old('short_description') }}" name="short_description" id="editors" class="form-control" placeholder=" Write something here.."></textarea>
                    </div>
                </div>

            </div>
        </div>
        <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary">Create Product</button>
        </div>
    </form>
</div>
</div>
<style type="text/css">
    .ck-editor__editable_inline{
      height: 150px;
    }

    </style>

<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#editors'))
        .catch(error => {
            console.error(error);
        });
</script>
