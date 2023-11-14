<section>
    <div class="container px-3 md:px-5 xl:px-0 xl:pt-10 xl:pb-20 py-8">
        <!-- shopping cart start -->
        <div class="shopping-cart">
            <div class="px-6 py-6 overflow-x-auto">
                <table class="min-w-[872px] w-full leading-normal">
                    <thead>
                        <tr>
                            <th class="pb-6 border-b border-[#E1E3E6] text-left text-xs font-semibold text-[#272343] uppercase tracking-wider w-[450px]">
                                Products
                            </th>
                            <th class="pb-6 border-b border-[#E1E3E6] text-left text-xs font-semibold text-[#272343] uppercase tracking-wider w-32">
                                Price
                            </th>
                            <th class="pb-6 border-b border-[#E1E3E6] text-left text-xs font-semibold text-[#272343] uppercase tracking-wider w-[120px]">
                                Stock Status
                            </th>
                            <th class="pb-6 border-b border-[#E1E3E6] text-left text-xs font-semibold text-[#272343] uppercase tracking-wider">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td class="py-6 text-sm">
                                    <div class="flex gap-2 items-center">
                                        <a href="{{ route('remove.Wishlist',$product->id) }}" class="p-2" onclick="dismiss(this);">
                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2 2L6.00003 6M6.00003 6L10 2M6.00003 6L2 10M6.00003 6L10 10" stroke="#9A9CAA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('details', $product->id) }}" class="w-[70px] h-[70px]">
                                            <img class="w-full h-full rounded-lg" src="{{ asset('public/assets/images/all-img/shopping-cart-01.png') }}" alt="{{ $product->name }}" />
                                        </a>
                                        <a href="{{ route('details', $product->id) }}" class="ml-1">
                                            <p class="mb-0 text-[#272343] text-sm">{{ $product->name }}</p>
                                        </a>
                                    </div>
                                </td>
                                <td class="py-6 text-sm">
                                    <p class="mb-0">BDT {{ $product->price }}</p>
                                </td>
                                <td class="py-6 text-sm">
                                    <p class="text-[#01AD5A] font-semibold">{{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}</p>
                                </td>
                                <td class="py-6 text-sm text-right">
                                    @if($wishlistItems->contains('product_id', $product->id))
                                        <button class="btn-wishlist2" disabled>Added to wishlist</button>
                                    @else
                                        <form action="{{ route('cart.add-from-wishlist', $product->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn-wishlist">Add to cart</button>
                                        </form>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- shopping cart end -->
    </div>
</section>
<!-- shopping cart List End -->
