
<div class="">
    <div class="container px-3 md:px-5 xl:px-0">
        <div class="product-details-wrap pt-10">
            <div class="left-side xl:w-7/12 w-full">
                <div class="gallery-container mb-[50px]">
                    <div class="xl:flex flex-col justify-between hidden">
                        <div class="gallery-button-prev"></div>
                        <div class="swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">
                                @foreach($products->gallery as $gallery)
                                    @if($gallery->images)
                                        @php $images = unserialize($gallery->images); @endphp
                                        @foreach($images as $image)
                                            <div class="swiper-slide">
                                                <img src="{{ asset('public/uploads/' . $image) }}" alt="Gallery Image">
                                            </div>
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="gallery-button-next"></div>
                    </div>
                    <div class="swiper-container gallery-main">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ url('public/uploads/',$products->thumbnail) }}" alt="Slide 01">
                            </div>
                            @foreach($products->gallery as $gallery)
                                @if($gallery->images)
                                    @php $images = unserialize($gallery->images); @endphp
                                    @foreach($images as $image)
                                        <div class="swiper-slide">
                                            <img src="{{ asset('public/uploads/' . $image) }}" alt="Gallery Image">
                                        </div>
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="single-product-desc">
                    <h2 class="text-[#272343] text-2xl font-semibold mb-3.5">Product Descriptions</h2>


                    <p class="text-[#636270] text-base">{!! $products->long_description !!}</p>
                </div>
            </div>
            <div class="right-side xl:px-8 px-0 xl:w-5/12 w-full">
                <h2 class="text-[#272343] pro-title font-semibold mb-3 capitalize">{{ $products->name }}</h2>
                <div class="flex items-center gap-2.5 mb-6">


                    <p class="flex gap-1.5 items-center">
                        <span class="text-[#272343] text-2xl">BDT {{ $products->discounted_price }}</span>
                        <span class="text-[#272343] opacity-30 text-xl line-through">{{ $products->price - $products->discounted_price }}</span>
                    </p>


                    <span class="bg-[#F5813F] px-2.5 py-1.5 rounded-[4px] text-white text-sm">{{ $products->discount }}% Off</span>
                </div>
                <p class="text-[#636270] text-base mb-6">
                    {!! $products->short_description!!}
                </p>
                <div class="mb-6">
                    <h2 class="text-[#9A9CAA] text-sm font-medium mb-3">Stock</h2>
                    <ul class="flex gap-[30px] items-center p-0 m-0">
                        <li>
                            <label for="black" class="inline-flex gap-2 items-center custom-radio cursor-pointer">
                                <input type="radio" id="black" checked name="color" class="hidden"/>
                                
                                <span class="text-base text-[#636270]"><b style="color: black">{{ $products->stock }}</b></span>
                            </label>
                        </li>
                    
                </div>
                <div class="mb-6">
                    <ul class="p-0 m-0">
                        
                        <li>
                            <p class="text-[15px] inline-flex gap-2 items-center">
                                <span class="text-[#9A9CAA]">Brand:</span><span class="text-[#636270] font-medium">{{ $products->brand->name }}</span>
                            </p>
                        </li>
                        <li>
                            <p class="text-[15px] inline-flex gap-2 items-center">
                                <span class="text-[#9A9CAA]">Category:</span><span class="text-[#636270] font-medium">{{ $products->category->name }}</span>
                            </p>
                        </li>
                        
                    </ul>
                </div>
                <div class="flex flex-wrap lg:flex-nowrap items-center gap-3 mb-6">
                    
                    <div class="flex gap-3 w-full">
                        <div class="xl:w-[343px] add-to-cart-btn">
                            <button class="inline-flex gap-3 py-3.5 bg-[#029FAE] hover:bg-[#272343] transition-all duration-300 rounded-lg px-4 xl:w-[343px] w-full items-center justify-center">
                                <span class="text-white text-base">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.75 3.25L4.83 3.61L5.793 15.083C5.82999 15.5345 6.03584 15.9554 6.36948 16.2618C6.70312 16.5682 7.14002 16.7375 7.593 16.736H18.503C18.9367 16.7365 19.3561 16.5803 19.6838 16.2963C20.0116 16.0122 20.2258 15.6194 20.287 15.19L21.237 8.632C21.2623 8.45759 21.253 8.2799 21.2096 8.10909C21.1662 7.93828 21.0896 7.77769 20.9841 7.63653C20.8786 7.49536 20.7463 7.37637 20.5947 7.28637C20.4432 7.19636 20.2754 7.13711 20.101 7.112C20.037 7.105 5.164 7.1 5.164 7.1" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M14.125 10.795H16.898" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.15398 20.203C7.22732 20.1999 7.30053 20.2116 7.36921 20.2375C7.4379 20.2634 7.50063 20.3029 7.55363 20.3537C7.60664 20.4045 7.64881 20.4655 7.67763 20.533C7.70645 20.6005 7.7213 20.6731 7.7213 20.7465C7.7213 20.8199 7.70645 20.8926 7.67763 20.9601C7.64881 21.0276 7.60664 21.0886 7.55363 21.1393C7.50063 21.1901 7.4379 21.2296 7.36921 21.2555C7.30053 21.2814 7.22732 21.2932 7.15398 21.29C7.01387 21.284 6.88149 21.2241 6.78448 21.1228C6.68746 21.0216 6.6333 20.8868 6.6333 20.7465C6.6333 20.6063 6.68746 20.4715 6.78448 20.3702C6.88149 20.2689 7.01387 20.209 7.15398 20.203Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18.4351 20.203C18.5797 20.203 18.7183 20.2604 18.8205 20.3626C18.9227 20.4648 18.9801 20.6035 18.9801 20.748C18.9801 20.8925 18.9227 21.0312 18.8205 21.1334C18.7183 21.2356 18.5797 21.293 18.4351 21.293C18.2906 21.293 18.152 21.2356 18.0498 21.1334C17.9476 21.0312 17.8901 20.8925 17.8901 20.748C17.8901 20.6035 17.9476 20.4648 18.0498 20.3626C18.152 20.2604 18.2906 20.203 18.4351 20.203Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <a href="{{ route('cart.add',$products->id) }}" class="text-white text-base">Add To Cart</a>
                            </button>
                        </div>
                        <div>
                           
                        </div>
                    </div>
                </div>
                <div class="flex gap-2.5 items-center">
                    <p>Share on</p>
                    {!! $shareComponent !!}
                </div>
                <div class="single-product-desc2">
                    <h2 class="text-[#272343] text-2xl font-semibold mb-3.5">Product Descriptions</h2>
                    <p>{!! $products->long_description!!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product details section end -->

<!-- product list section start-->
<section class="xl:py-20 py-6 md:py-10">
    <div class="container px-3 md:px-5 xl:px-0">
        <div class="flex items-center justify-between items-cente mb-10">
            <h2 class="text-[#272343] xl:text-[32px] xl:leading-[110%] text-xl md:text-2xl font-semibold font-display">Similar Products</h2>
            <div class="flex gap-[18px]">
                <button class="recentSwiper-button-prev">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="24" height="24" transform="matrix(-1 0 0 1 24 0)" fill="none" />
                        <path d="M8.5 7.5L4 12M4 12L8.5 16.5M4 12H20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <button class="recentSwiper-button-next">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.5 7.5L20 12M20 12L15.5 16.5M20 12H4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="swiper recentSwiper overflow-hidden">
            <div class="swiper-wrapper">

            @foreach ($relatedProducts as $item)


                <div class="swiper-slide">
                    <div class="product-card">
                        <a href="{{ route('details',$item->id) }}">
                            <div class="product-thumb">
                                <img src="{{ url('/public/uploads/',$item->image) }}" alt="">
                                <span class="badge new">New</span>
                            </div>
                            <div class="product-info">
                                <div>
                                    <h2 class="product-name">{{ $item->name }}</h2>
                                    <h3 class="product-price">BDT {{ $item->price }}</h3>
                                </div>
                                <div>
                                    <a href="{{ route('cart.add',$products->id) }}" class="cart-icon">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.52081 2.97913L4.42748 3.30913L5.31023 13.826C5.34414 14.2399 5.53284 14.6257 5.83867 14.9066C6.14451 15.1875 6.545 15.3427 6.96023 15.3413H16.9611C17.3586 15.3417 17.743 15.1986 18.0435 14.9382C18.344 14.6778 18.5403 14.3177 18.5964 13.9241L19.4672 7.91263C19.4904 7.75275 19.4819 7.58987 19.4421 7.43329C19.4023 7.27671 19.3321 7.12951 19.2354 7.00011C19.1387 6.8707 19.0174 6.76163 18.8785 6.67913C18.7396 6.59663 18.5858 6.54231 18.4259 6.51929C18.3672 6.51288 4.73365 6.50829 4.73365 6.50829" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M12.9479 9.89539H15.4898" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.5578 18.5194C6.62502 18.5165 6.69213 18.5272 6.75509 18.551C6.81805 18.5747 6.87556 18.611 6.92414 18.6575C6.97273 18.704 7.01139 18.7599 7.03781 18.8218C7.06422 18.8837 7.07784 18.9503 7.07784 19.0176C7.07784 19.0849 7.06422 19.1515 7.03781 19.2133C7.01139 19.2752 6.97273 19.3311 6.92414 19.3777C6.87556 19.4242 6.81805 19.4605 6.75509 19.4842C6.69213 19.5079 6.62502 19.5187 6.5578 19.5158C6.42936 19.5103 6.30801 19.4554 6.21908 19.3626C6.13015 19.2697 6.08051 19.1461 6.08051 19.0176C6.08051 18.889 6.13015 18.7654 6.21908 18.6726C6.30801 18.5798 6.42936 18.5249 6.5578 18.5194Z" fill="#272343" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.8988 18.5194C17.0312 18.5194 17.1583 18.572 17.252 18.6657C17.3457 18.7594 17.3983 18.8865 17.3983 19.019C17.3983 19.1515 17.3457 19.2786 17.252 19.3723C17.1583 19.4659 17.0312 19.5186 16.8988 19.5186C16.7663 19.5186 16.6392 19.4659 16.5455 19.3723C16.4518 19.2786 16.3992 19.1515 16.3992 19.019C16.3992 18.8865 16.4518 18.7594 16.5455 18.6657C16.6392 18.572 16.7663 18.5194 16.8988 18.5194Z" fill="#272343" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="heart-icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.63268 10.6315C1.64909 7.56068 2.79768 4.05077 6.02251 3.01218C6.85874 2.74461 7.74682 2.68088 8.61268 2.8263C9.47855 2.97173 10.2971 3.3221 11 3.84818C12.3338 2.81693 14.2743 2.4686 15.9683 3.01218C19.1923 4.05077 20.3491 7.56068 19.3664 10.6315C17.8356 15.499 11 19.2482 11 19.2482C11 19.2482 4.21484 15.5558 2.63268 10.6315V10.6315Z" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </div>
</section>
<!-- product list section end-->


<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
       
        var galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 10,
            slidesPerView: 40,
            freeMode: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
        });
        var galleryMain = new Swiper('.gallery-main', {
            spaceBetween: 10,
            navigation: {
                nextEl: '.gallery-button-next',
                prevEl: '.gallery-button-prev',
            },
            thumbs: {
                swiper: galleryThumbs,
            },
        });
    });
</script>
