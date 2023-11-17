<section>
    <div class="container px-3 md:px-5 xl:px-0">
        <!-- Shopping cart List Start -->
        <div class="shopping-cart-wrapper pt-10 pb-20 flex lg:flex-nowrap flex-wrap items-start gap-6">
            <!-- Shopping cart start -->
            <div class="shopping-cart lg:w-2/3 w-full">
                <div class="px-6 py-6 overflow-x-auto">
                    <table class="w-[824px] leading-normal">
                        <thead>
                            <tr>
                                <th class="pb-6 border-b border-[#E1E3E6] text-left text-xs font-semibold text-[#272343] uppercase tracking-wider w-[240px]">
                                    Products
                                </th>
                                <th class="pb-6 border-b border-[#E1E3E6] text-left text-xs font-semibold text-[#272343] uppercase tracking-wider w-[104px]">
                                    Price
                                </th>
                                <th class="pb-6 border-b border-[#E1E3E6] text-left text-xs font-semibold text-[#272343] uppercase tracking-wider w-[164px]">
                                    Quantity
                                </th>
                                <th class="pb-6 border-b border-[#E1E3E6] text-left text-xs font-semibold text-[#272343] uppercase tracking-wider w-[96px]">
                                    Sub Total
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartContents as $item)
                                <tr class="cart-item">
                                    <td class="py-6 text-sm">
                                        <div class="flex gap-2 items-center">
                                            <a href="{{ route('cart.remove',$item->id) }}" class="del">
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2 2L6.00003 6M6.00003 6L10 2M6.00003 6L2 10M6.00003 6L10 10" stroke="#9A9CAA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                            <div class="w-[70px] h-[70px]">
                                                <img class="w-full h-full rounded-lg" src="{{ $item->attributes->image }}" alt="{{ $item->name }}" />
                                            </div>
                                            <div class="ml-1">
                                                <p class="mb-0 text-[#272343] text-sm">{{ $item->name }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-6 text-sm">
                                        <p class="mb-0">BDT {{ number_format($item->price, 2) }}</p>
                                    </td>
                                    <td class="py-6 text-sm">
                                        <div class="border inline-flex justify-around items-center h-[52px] w-[140px] border-[#D6D9DD] rounded-lg">
                                            <span class="w-5 h-5 inline-flex justify-center items-center text-[#9A9CAA] pl-[14px] select-none minus" id="minus">-</span>
                                            <p class="text-[#272343] text-base plus_mines_input select-none">{{ $item->quantity }}</p>
                                            <span class="w-5 h-5 inline-flex justify-center items-center text-[#9A9CAA] pr-[14px] select-none plus" id="plus">+</span>
                                        </div>
                                    </td>
                                    <td class="py-6 text-sm">
                                        <p>BDT {{ number_format($item->price * $item->quantity, 2) }}</p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <hr class="my-0">
                <div class="coupon-wrap p-6">
                    <!-- Coupon code and apply button here -->
                    <input type="text" name="" id="" class="px-5 py-[18px] bg-[#F0F2F3] rounded-lg border-none focus:outline-none coupon-input coupon-btn w-full block focus:ring-2 ring-[#029FAE]" placeholder="Coupon Code">
                    <button type="submit" class="bg-[#007580] hover:bg-[#272343] transition-all duration-300 inline-flex font-semibold text-gray-white coupon-btn px-6 py-[17px] rounded-lg">Apply Coupon Code</button>
                    <button class="bg-off-white text-[#272343] coupon-btn font-semibold py-[17px] px-6 rounded-lg">Update Cart</button>
                </div>
            </div>
            <!-- Shopping cart end -->

            <!-- Cart Total End -->
            <div class="cart-total p-8 lg:w-1/3 w-full">
                <div class="subtotal-info">
                    <!-- Subtotal, discount, shipping, and total information here -->
                    <div class="flex justify-between items-center">
                        <p class="common-hedding">subtotal</p>
                        <p class="text-gray-black text-[16px] leading-[120%] font-display font-medium">BDT {{ number_format($totalPrice, 2) }}</p>
                    </div>
                    <div class="flex justify-between items-center pt-4">
                        <p class="common-hedding">discount</p>
                        <p class="text-gray-black text-[16px] leading-[120%] font-display font-medium">26%</p>
                    </div>
                    <div class="flex justify-between items-center pt-4">
                        <p class="common-hedding">shipping </p>
                        <p class="text-gray-black text-[16px] leading-[120%] font-display font-medium">Free</p>
                    </div>
                    <hr>
                    <div class="flex justify-between items-center">
                        <p class="common-hedding">Total:</p>
                        <p class="text-gray-black text-[22px] leading-[120%] font-display font-semibold">BDT {{ number_format($totalPrice, 2) }}</p>
                    </div>
                </div>
                <a href="{{ route('place.order', $item->id ?? 'default_value') }}" class="mt-6 bg-accents hover:bg-[#272343] transition-all duration-300 py-[19px] rounded-lg text-[18px] font-bold font-display leading-[110%] text-gray-white text-center w-full">
                    proceed to Checkout
                </a>

            </div>
            <!-- Cart Total Start -->
        </div>
    </div>
</section>
