<div class="container">
    <!-- Tab Contents -->
    <div id="tab-contents">
        <!-- Order Details start -->
        <div class="p-4">
            <div class="container pt-10 pb-20">
                <div class="box">
                    <div class="">
                        <div class="flex flex-wrap justify-between items-center px-8 py-[30px]">
                            <h2 class="text-[#272343] font-display xl:text-[32px] text-[18px] font-semibold leading-[110%] capitalize">Order Details</h2>
                            <a href="{{ route('order.history') }}" class="btn-primary capitalize">back to List</a>
                        </div>
                        <hr class="my-0">
                        <div class="px-8 py-8 flex flex-col md:flex-row md:flex-wrap gap-6 xl:gap-2 xl:justify-between md:items-center">
                            <div class="flex-wrap">
                                <p class="text-[#9A9CAA] font-display text-[14px] leading-[100%] capitalize pb-[10px]">Order ID:</p>
                                <span class="text-gray-black font-display text-[20px] leading-[120%] font-medium">{{ preg_replace('/[^0-9]/', '', $orderDetails->created_at->format('Ymd')) }}
                                </span>
                            </div>
                            <div class="flex-wrap">
                                <p class="text-[#9A9CAA] font-display text-[14px] leading-[100%] capitalize pb-[10px]">Date:</p>
                                <span class="text-gray-black font-display text-[20px] leading-[120%] font-medium">{{ $orderDetails->created_at->format('D M ,Y') }}</span>
                            </div>
                            <div class="flex-wrap">
                                <p class="text-[#9A9CAA] font-display text-[14px] leading-[100%] capitalize pb-[10px]">Email:</p>
                                <span class="text-gray-black font-display text-[20px] leading-[120%] font-medium">{{ $orderDetails->email }}</span>
                            </div>
                            <div class="flex-wrap">
                                <p class="text-[#9A9CAA] font-display text-[14px] leading-[100%] capitalize pb-[10px]">Total:</p>
                                <span class="text-gray-black font-display text-[20px] leading-[120%] font-medium">BDT {{ $orderDetails->total }}</span>
                            </div>
                            <div class="flex-wrap">
                                <p class="text-[#9A9CAA] font-display text-[14px] leading-[100%] capitalize pb-[10px]">Status:</p>
                                <span class="text-gray-black font-display text-[20px] leading-[120%] font-medium">{{ $orderDetails->status }}</span>
                            </div>
                            <div class="flex-wrap">
                                <p class="text-[#9A9CAA] font-display text-[14px] leading-[100%] capitalize pb-[10px]">Payment Method:</p>
                                <span class="text-gray-black font-display text-[20px] leading-[120%] font-medium">{{ $orderDetails->paymenttype == 1 ? 'COD':'SSLcommerze' }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="overflow-x-auto">
                            <table class="min-w-full leading-normal">
                                <thead class="bg-off-white">
                                    <tr class="">
                                        <th class="pt-4 pb-4 px-8 border-b border-[#E1E3E6] text-left text-lg font-medium leading-[100%] text-[#272343] uppercase tracking-wider w-[305px]">
                                            Product
                                        </th>
                                        <th class="pt-4 pb-4 border-b border-[#E1E3E6] text-left text-lg font-medium leading-[100%] text-[#272343] uppercase tracking-wider w-[140px]">
                                            Price
                                        </th>
                                        <th class="pt-4 pb-4 border-b border-[#E1E3E6] text-left text-lg font-medium leading-[100%] text-[#272343] uppercase tracking-wider w-[145px]">
                                            Quantity
                                        </th>
                                        <th class="pt-4 pb-4 border-b border-[#E1E3E6] text-left text-lg font-medium leading-[100%] text-[#272343] uppercase tracking-wider w-[175px]">
                                            Subtotal
                                        </th>
                                        <th class="pt-4 pb-4 border-b border-[#E1E3E6] text-left text-lg font-medium leading-[100%] text-[#272343] uppercase tracking-wider w-[295px]">
                                            Info
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>




                                    <tr class="">
                                        <td class="text-sm px-6 pt-6">
                                            <div class="flex justify-between items-center">
                                                <div class="flex items-center gap-3">
                                                    <div>
                                                        <img src="./public/assets/images/all-img/product1.png" alt="">
                                                    </div>

                                                    <p>{{ $orderDetails->product->name }}</p>

                                                </div>

                                            </div>
                                        </td>
                                        <td class="text-sm">
                                            <p class="mb-0">BDT {{ $orderDetails->amount }}</p>
                                        </td>
                                        <td class="text-sm">
                                            <p>{{ $orderDetails->quantity }}</p>
                                        </td>
                                        <td class="text-sm">
                                            <p>BDT {{ $orderDetails->total }}</p>
                                        </td>
                                        <td class="text-sm pt-6">
                                            <div class="mb-6">
                                                <ul class="p-0 m-0 ">


                                                    <li>
                                                        <p class="text-[15px] inline-flex gap-2 items-center">
                                                            <span class="text-[#9A9CAA]">Brand:</span><span class="text-[#636270] font-medium">Purefit</span>
                                                        </p>
                                                    </li>

                                                </ul>
                                            </div>
                                        </td>
                                    </tr>



                                </tbody>
                            </table>
                        </div>

                    </div>
                    <hr class="my-0">

                    <div class="px-8 py-8 flex flex-col md:flex-row md:flex-wrap gap-y-6 justify-between md:items-center">

                        <div>
                            <h2 class="text-gray-black font-medium font-display xl:text-[32px] text-[20px] leading-[110%] capitalize ">Billing address</h2>
                            <p class="font-display text-[16px] leading-[120%] font-normal text-[#272343] pt-5 pb-2">Kevin Gilbert</p>
                            <p class="text-[#636270] text-[14px] leading-[150%] font-display font-normal pb-4">
                                4140 Parker Rd. Allentown, New Mexico 31134
                            </p>
                            <p class="text-[#636270] text-[14px] leading-[100%] font-display font-normal pb-4">kevin.gilbert@gmail.com</p>
                            <span class="text-[#636270] text-[14px] leading-[100%] font-display font-normal">+8801497 548244</span>
                        </div>

                        <div>
                            <h2 class="text-gray-black font-medium font-display xl:text-[32px] text-[20px] leading-[110%] capitalize">Shipping address</h2>
                            <p class="font-display text-[16px] leading-[120%] font-normal text-[#272343] pt-5 pb-2">Kevin Gilbert</p>
                            <p class="text-[#636270] text-[14px] leading-[150%] font-display font-normal pb-4">
                                4140 Parker Rd. Allentown, New Mexico 31134
                            </p>
                            <p class="text-[#636270] text-[14px] leading-[100%] font-display font-normal pb-4">kevin.gilbert@gmail.com</p>
                            <span class="text-[#636270] text-[14px] leading-[100%] font-display font-normal">+8801497 548244</span>
                        </div>

                        <div class="px-6 py-6 bg-off-white rounded-lg max-w-[348px] w-full">
                            <div class="">

                                <div class="flex justify-between pb-4">
                                    <p>Subtotal</p>
                                    <p>BDT {{ $orderDetails->total }}</p>
                                </div>
                                <div class="flex justify-between pb-4">
                                    <p>discount</p>
                                    <p>26%</p>
                                </div>
                                <div class="flex justify-between">
                                    <p>shipping</p>
                                    <p>Free</p>
                                </div>
                                <hr>
                                <div class="flex justify-between">
                                    <p class="text-[18px] font-display text-dark-gray ">Total:</p>
                                    <p class="text-[22px] font-display leading-[120%] font-sem">BDT {{ $orderDetails->total }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Order Details end -->
    </div>
</div>
<!-- user menu end -->
