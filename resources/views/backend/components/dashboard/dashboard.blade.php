 <!-- Page body -->
 <div class="page-body">
    <div class="container-xl">
      <div class="row row-deck row-cards">
        <div class="col-sm-6 col-lg-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="subheader">NUMBER OF PRODUCT</div>
                <div>
                  <div class="dropdown">
                    <div class="dropdown-menu dropdown-menu-end">
                    </div>
                  </div>
                </div>
              </div>
              <div class="h1 mb-3">{{ $totalProducts }}</div>
              <div class="d-flex mb-2">
                <div class="ms-auto">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="subheader">Register users</div>
                <div class="ms-auto lh-1">
                  <div class="dropdown">


                  </div>
                </div>
              </div>
              <div class="d-flex align-items-baseline">
                <div class="h1 mb-0 me-2">{{ $totalCustomers }}</div>
                <div class="me-auto">
                  <span class="text-green d-inline-flex align-items-center lh-1">
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="subheader">NUMBER OF BRANDS</div>
                <div class="ms-auto lh-1">
                  <div class="dropdown">
                  </div>
                </div>
              </div>
              <div class="d-flex align-items-baseline">
                <div class="h1 mb-3 me-2">{{ $totalBrands }}</div>
                <div class="me-auto">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="subheader">Testimonials</div>
                <div class="ms-auto lh-1">
                  <div class="dropdown">

                    <div class="dropdown-menu dropdown-menu-end">

                    </div>
                  </div>
                </div>
              </div>
              <div class="d-flex align-items-baseline">
                <div class="h1 mb-3 me-2">{{ $testimonials }}</div>
                <div class="me-auto">

                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="row row-cards">
            <div class="col-sm-6 col-lg-3">
              <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" /><path d="M12 3v3m0 12v3" /></svg>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                        {{ $totalOrdersDelivered }} Sales
                      </div>
                      <div class="text-muted">
                        {{ $totalOrdersPending }} waiting payments
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 17h-11v-14h-2" /><path d="M6 5l14 1l-1 7h-13" /></svg>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                        {{ $totalOrders }} Orders
                      </div>
                      <div class="text-muted">
                        {{ $totalOrdersDelivered }} shipped
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            {{-- <div class="col-sm-6 col-lg-3">
              <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-twitter text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z" /></svg>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                        6 Shares(Not Dynamin)
                      </div>
                      <div class="text-muted">
                        16 today
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> --}}
            <div class="col-sm-6 col-lg-3">
              <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-facebook text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 4h6v6h-6zm10 0h6v6h-6zm-10 10h6v6h-6zm10 3h6m-3 -3v6"></path>
                         </svg>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                        {{ $totalCategories }} Category
                      </div>
                      <div class="text-muted">
                        {{ $totalCategoryActive }} Active
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Traffic summary</h3>
              <div id="chart-mentions" class="chart-lg"></div>
            </div>
          </div>
        </div>





      </div>
    </div>
  </div>
