

<div class="container">
    <br><h2 style="text-align: center">Category Table</h2>
    <div style="text-align: right">
        <a href="{{ route('products.index') }}" class="btn btn-info" style="margin-right: 10px;">+ Add Product</a>
    </div><br><br>
    <div class="col-12">
        <div class="card">
          <div class="table-responsive">
            <table
             class="table table-vcenter table-mobile-md card-table">
              <thead>
                <tr>
                    <th>Sl</th>
                    <th>Thumbnail</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category </th>
                    <th>Brand</th>

                    <th>Stock</th>
                    <th>Discount</th>
                    <th>Status</th>
                    <th>Features</th>

                  <th class="w-1">Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($products as $product)


                <tr>
                    <tr>
                        <td data-label="sl" >{{ $product->id }} </td>
                        <td data-label="img" >
                            <img height="100px" width="100px" src="{{ url('/public/uploads/' , $product->thumbnail) }}" alt="product">

                        </td>
                        <td data-label="Title" >{{ $product->name }} </td>
                        <td data-label="Title" >BDT {{ $product->price }} </td>
                        <td data-label="Title" >{{ $product->category->name }} </td>
                        <td data-label="Title" >{{ $product->brand->name }} </td>

                        <td data-label="Title" >{{ $product->stock }} </td>
                        <td data-label="Title" >{{ $product->discount }} </td>
                        <td data-label="Title" >{{ $product->status == 1? 'Active':'Inactive' }} </td>
                        <td data-label="Title" >{{ $product->features == 1? 'True': 'False'	 }} </td>


                  <td>
                    <div class="btn-list flex-nowrap">
                      <a href="{{ route('product.edit',$product->id) }}" class="btn">
                        Edit
                      </a>
                      <div class="dropdown">
                        <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                          Actions
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a class="dropdown-item" href="{{ route('product.gallery',$product->id) }}">
                            Add Gallery
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
