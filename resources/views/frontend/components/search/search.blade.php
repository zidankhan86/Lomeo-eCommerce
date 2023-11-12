<section class="lg:py-20 sm:py-8 py-6">
    <div class="container px-3 md:px-5 xl:px-0">
        <h2 class="text-gray-black xl:text-[32px] xl:leading-[110%] text-xl md:text-2xl text-center font-semibold font-display mb-4">Our Products</h2>
        <ul id="filters" class="flex flex-wrap justify-center gap-2 mb-10">
            <li><button class="filter text-[#9A9CAA] text-base leading-[110%] font-display font-medium cursor-pointer p-2 mixitup-control-active" data-filter=".all" data-mixitup-control>All</button></li>
            <li><button class="filter text-[#9A9CAA] text-base leading-[110%] font-display font-medium cursor-pointer p-2" data-filter=".newest">Newest</button></li>
            <li><button class="filter text-[#9A9CAA] text-base leading-[110%] font-display font-medium cursor-pointer p-2" data-filter=".trending">Trending</button></li>
            <li><button class="filter text-[#9A9CAA] text-base leading-[110%] font-display font-medium cursor-pointer p-2" data-filter=".best-sellers">Best Sellers</button></li>
            <li><button class="filter text-[#9A9CAA] text-base leading-[110%] font-display font-medium cursor-pointer p-2" data-filter=".featured">Featured</button></li>
        </ul>

        <div id="portfoliolist" class="portfoliolist justify-center mx-auto">
            @if ($search->count() > 0)
                @foreach ($search as $product)
                    <div class="mix all featured" data-cat="featured">
                        <div class="product-card">
                            <a href="{{ route('details', $product->id) }}">
                                <div class="product-thumb">
                                    <img src="{{ url('public/uploads/', $product->thumbnail) }}" alt="">
                                    <span class="badge new">New</span>
                                </div>
                                <div class="product-info">
                                    <div>
                                        <h2 class="product-name">{{ $product->name }}</h2>
                                        <h3 class="product-price">BDT {{ $product->price }}</h3>
                                    </div>
                                    <div>
                                        @auth
                                            <a href="{{ route('cart.add', auth()->user()->id) }}" class="cart-icon">
                                                <!-- ... (existing code for cart icon) ... -->
                                            </a>
                                        @endauth

                                        {{-- Check if the current product is in the wishlist --}}
                                        @php
                                            $isInWishlist = $wishlistItems->contains('product_id', $product->id);
                                        @endphp

                                        <a href="{{ url('/wishlist/add', ['productId' => $product->id]) }}" class="heart-icon">
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.63268 10.6315C1.64909 7.56068 2.79768 4.05077 6.02251 3.01218C6.85874 2.74461 7.74682 2.68088 8.61268 2.8263C9.47855 2.97173 10.2971 3.3221 11 3.84818C12.3338 2.81693 14.2743 2.4686 15.9683 3.01218C19.1923 4.05077 20.3491 7.56068 19.3664 10.6315C17.8356 15.499 11 19.2482 11 19.2482C11 19.2482 4.21484 15.5558 2.63268 10.6315V10.6315Z"
                                                    stroke="{{ $isInWishlist ? '#FF0000' : '#272343' }}"
                                                    stroke-width="1.5"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                 </svg>
                                        </a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
                <strong class="text-danger">No Product Found.</strong>
            @endif
        </div>
    </div>
</section>
