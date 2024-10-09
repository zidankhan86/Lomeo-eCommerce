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
                                <th class="pb-6 border-b border-[#E1E3E6] text-left text-xs font-semibold text-[#272343] uppercase tracking-wider w-[96px]">
                                    Update
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartContents as $item)
                            <tr class="cart-item">
                                <td class="py-6 text-sm">
                                    <div class="flex gap-2 items-center">
                                        <a href="{{ route('cart.remove', $item->id) }}" class="del">
                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2 2L6.00003 6M6.00003 6L10 2M6.00003 6L2 10M6.00003 6L10 10" stroke="#9A9CAA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                        <div class="w-[70px] h-[70px]">
                                            @if ($item->model && $item->model->thumbnail)
                                                <img class="w-full h-full rounded-lg" src="{{ url('/public/uploads/', $item->model->thumbnail) }}" alt="Thumbnail Image">
                                            @endif
                                        </div>
                                        <div class="ml-1">
                                            <p class="mb-0 text-[#272343] text-sm">{{ $item->name }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-6 text-sm">
                                    <p class="mb-0">BDT {{ number_format(floatval($item->price), 2) }}</p>
                                </td>
                                <td class="py-6 text-sm">
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                        @csrf
                                        <!-- Hidden input to pass the product ID explicitly -->
                                        <input type="hidden" name="productId" value="{{ $item->id }}">
                                        <input type="number" name="quantity" value="{{ intval($item->quantity) }}" min="1" class="w-[60px] border-gray-300 rounded-md">
                                </td>
                                <td class="py-6 text-sm">
                                    <!-- Subtotal calculation -->
                                    <p>BDT {{ number_format(floatval($item->price) * intval($item->quantity), 2) }}</p>
                                </td>
                                <td class="py-6 text-sm">
                                    <button type="submit" class="bg-[#007580] hover:bg-[#272343] transition-all duration-300 inline-flex font-semibold text-gray-white px-4 py-2 rounded-lg">Update</button>
                                    </form>  <!-- Ensure form closing tag is inside this block -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Cart Total Section -->
            <div class="cart-total p-8 lg:w-1/3 w-full">
                <div class="subtotal-info">
                    <div class="flex justify-between items-center">
                        <p class="common-heading">Subtotal</p>
                        <!-- Ensure the totalPrice is cast to float -->
                        <p class="text-gray-black text-[16px] leading-[120%] font-display font-medium">BDT {{ number_format(floatval($totalPrice), 2) }}</p>
                    </div>

                    <div class="flex justify-between items-center pt-4">
                        <p class="common-heading">Shipping</p>
                        <p class="text-gray-black text-[16px] leading-[120%] font-display font-medium">Free</p>
                    </div>
                    <hr>
                    <div class="flex justify-between items-center">
                        <p class="common-heading">Total:</p>
                        <p class="text-gray-black text-[22px] leading-[120%] font-display font-semibold">BDT {{ number_format(floatval($totalPrice), 2) }}</p>
                    </div>
                </div>
                <a href="{{ route('place.order', $item->id ?? 'default_value') }}" class="mt-6 bg-accents hover:bg-[#272343] transition-all duration-300 py-[19px] rounded-lg text-[18px] font-bold font-display leading-[110%] text-gray-white text-center w-full">
                    Proceed to Checkout
                </a>
            </div>
            <!-- Cart Total End -->
        </div>
    </div>
</section>
