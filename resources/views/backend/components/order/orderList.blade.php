
<style>
    img{
        height: 100px;
        width: 100px;
        border-radius: 50%;
    }
</style>
<div class="container">
    <br><h2 style="text-align: center">Order List</h2>
    <div style="text-align: right">
    </div><br><br>
    <div class="col-12">
        <div class="card">
          <div class="table-responsive">
            <table
             class="table table-vcenter table-mobile-md card-table">
              <thead>
                <tr>
                    <th>Sl</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Address </th>
                    <th>Transaction</th>
                    <th>Status</th>
                    <th>User</th>


                  <th class="w-1">Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($orders as $order)


                <tr>
                    <tr>
                        <td data-label="sl" >{{ $order->id }}</td>
                        <td data-label="img" >
                            <img src="" alt="product">
                        </td>
                        <td data-label="Name">{{ $order->product->name}} </td>
                        <td data-label="price">BDT {{ $order->amount }} </td>
                        <td data-label="product Name">{{ $order->address }} </td>
                        <td data-label="Title"> {{ $order->transaction_id }}</td>

                        <td data-label="Title">{{ $order->status }} </td>
                        <td data-label="Title">{{ $order->user->name }} </td>




                  <td>
                    <div class="btn-list flex-nowrap">
                      
                      <div class="dropdown">
                        <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                          Actions
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a class="dropdown-item">
                            Add Gallery
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
