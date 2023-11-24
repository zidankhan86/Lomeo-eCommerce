

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
                    <th>Inv</th>
                    <th>Payment Type</th>

                  <th class="w-1">Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($orders as $order)


                <tr>
                    <tr>
                        <td data-label="sl" >{{ $order->id }}</td>
                        <td data-label="img" >
                            <img height="100" width="100" src="{{ url('/public/uploads/',$order->product->thumbnail) }}" alt="product">
                        </td>
                        <td data-label="Name">{{ $order->product->name}} </td>
                        <td data-label="price">BDT {{ $order->amount }} </td>
                        <td data-label="product Name">{{ $order->address }} </td>
                        <td data-label="Title"> {{ $order->transaction_id }}</td>

                        <td data-label="Title">{{ $order->status }} </td>
                        <td data-label="Title">{{ $order->user->name }} </td>
                        <td data-label="Title">{{ $order->paymenttype == 1 ? 'COD': 'Online payment' }} </td>
                        <td><a href="{{ route('order.inv',$order->id) }}">INV</a></td>

                  <td>
                    <div class="btn-list flex-nowrap">

                      <div class="dropdown">
                        <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                          Actions
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">

                            @if ($order->status !== 'Ship' && $order->status !== 'Delivered')
                            <a href="{{ route('order.on.the.way', $order->id) }}" class="dropdown-item">
                                Ship
                            </a>
                            @elseif ($order->status == 'Processing' || $order->status == 'Pending')
                        <a href="{{ route('order.on.the.way', $order->id) }}" class="dropdown-item">
                            Ship
                        </a>
                        @else
                            <p class="dropdown-item">
                                Shipped
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="currentColor" />
                                </svg>
                            </p>
                        @endif



                          @if ($order->status !== 'Delivered')
                          <a class="dropdown-item" href="{{ route('order.completed',$order->id) }}">
                            Complete
                           </a>
                          @else
                        <p class="dropdown-item"> Completed<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="currentColor" /></svg></p>
                          @endif

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
