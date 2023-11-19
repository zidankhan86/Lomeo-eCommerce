 <!-- Sign In Form Start -->
 <div class="container py-20">
    <div class="flex flex-wrap lg:flex-nowrap items-start gap-6">
        <!-- cart billing start -->
        <div class="cart-total lg:w-2/3 w-full p-8">
            <h2 class="text-start text-2xl text-[#272343] font-semibold mb-6 font-display">Billing Information</h2>
            <div>
                <form action="{{ route('pay',$product->id) }}" class="" method="POST">
                    @csrf
                    <div class="flex flex-col sm:flex-row gap-5 items-center mb-5">
                        <div class=" w-full">
                            <input type="text" placeholder="First Name" name="name" class="input-box focus:outline-none focus:ring-2 focus:ring-accents font-display transition duration-300 ease-in-out">
                        </div>

                        <div class=" w-full">

                            <input type="text" placeholder="Last Name" name="last_name" class="input-box focus:outline-none  focus:ring-2 focus:ring-accents font-display transition duration-300 ease-in-out">
                        </div>
                    </div>
                    <div class="w-full inline-flex mb-5">
                        <textarea name="address" class="input-box focus:outline-none  focus:ring-2 focus:ring-accents font-display transition duration-300 ease-in-out" placeholder="Address" name="" id="" cols="10" rows="5"></textarea>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-5 items-center mb-5">
                        <div class=" w-full">
                            <input type="tel" name="phone" placeholder="Phone" class="input-box focus:outline-none  focus:ring-2 focus:ring-accents font-display transition duration-300 ease-in-out">
                        </div>

                        <div class=" w-full">

                            <input type="email" name="email" placeholder="Email" class="input-box focus:outline-none  focus:ring-2 focus:ring-accents font-display transition duration-300 ease-in-out">
                        </div>
                    </div>

                                    <div>
                                        <input type="hidden" name="total" value="{{ $product->price }}">
                                    </div>

                                    <div>
                                        <input type="hidden" name="price" value="{{ $product->price }}">
                                    </div>
                                    {{-- <div>
                                        <input type="hidden" name="currency" value="BDT">
                                    </div> --}}
                                    <div>
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    </div>
                                    <div>
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    </div>



                    <div class="cursor-pointer">
                        <input id="wp-comment-cookies-consent"  class="cursor-pointer" type="checkbox" >
                        <label for="wp-comment-cookies-consent">Ship to a different address</label>
                    </div>
                    <hr class="my-8">

                    <div>
                        <h2 class="mb-6 text-2xl text-[#272343] font-display font-semibold">Payment</h2>
                        <!-- <div class="flex items-center mt-6">
                                <input id="default-radio-2" type="radio" value="" name="default-radio"
                                class="w-4 h-4  border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 cursor-pointer">
                                <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cash on Delivery</label>
                            </div> -->
                        <div class="flex items-center mb-4 ">
                            <input checked id="default-radio-1" type="radio" value="" name="default-radio" class="w-4 h-4">
                            <label for="default-radio-1" class="ml-2 text-[18px] leading-[110%] font-normal text-gray-black cursor-pointer">Online Payment with SSLcommerze</label>
                        </div>
                        <!-- <div class="my-8 border h-[1px] border-gray-black"></div> -->
                        <hr>

                        <div class="flex items-center gap-[27px] pb-6">

                            <div class="flex items-center">
                                <input id="default-radio-2" type="radio" value="" name="default-radio" class="w-4 h-4">
                                <label for="default-radio-2" class="ml-2 text-[18px] leading-[110%] font-normal text-gray-black cursor-pointer">COD</label>
                            </div>


                        </div>

                        <div class="bg-off-white rounded-lg p-6">
                            <p class="font-display text-[14px] leading-[150%] font-normal text-dark-gray">Integer mollis lectus non leo auctor consequat. Duis faucibus dui nibh, in congue sapien imperdiet id. Pellentesque et elementum elit. Donec tempus, </p>
                        </div>

                    </div>
            </div>
        </div>
        <!-- cart billing end -->






        <!-- cart details start -->
        <<div class="cart-total p-8 h-auto lg:w-1/3 w-full">
            <!-- Loop through each item in the cart -->
            @foreach($cartContents as $item)
                <!-- cart item start  -->
                <div class="flex justify-between items-center pb-4">
                    <div class="flex items-center gap-3">
                        <div>
                            <img src="" alt="{{ $item->name }}">
                        </div>
                        <div class="flex gap-[6px]">
                            <p>{{ $item->name }}</p>
                            <span>X</span>
                            <p>{{ $item->quantity }}</p>
                        </div>
                    </div>
                    <p class="text-gray-black text-[16px] leading-[120%] font-display font-medium">BDT {{ $item->price }}</p>
                </div>
                <!-- cart item end -->
            @endforeach

            <hr>


            <div class="subtotal-info">

                <div class="subtotal-info">
                    <!-- Display subtotal, discount, shipping, and total -->
                    <div class="flex justify-between items-center">
                        <p class="common-hedding">subtotal</p>
                        <p class="text-gray-black text-[16px] leading-[120%] font-display font-medium">BDT {{ $totalPrice }}</p>
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
                        <p class="text-gray-black text-[22px] leading-[120%] font-display font-semibold">BDT {{ $totalPrice }}</p>
                    </div>

                    <!-- Remember information checkbox -->
                    <div class="cursor-pointer pt-[34px]">
                        <input id="wp-comment-cookies-consent1" name="wp-comment-cookies-consent" class="cursor-pointer" type="checkbox" value="yes">
                        <label for="wp-comment-cookies-consent1" class="text-dark-gray text-[14px] font-display leading-[110%] font-normal">Remember all information for faster payments</label>
                    </div>

                    <!-- Place order button -->
                    <button class="w-full flex gap-3 items-center justify-center mt-5 bg-accents hover:bg-[#272343] rounded-lg transition-all duration-300 py-[16px] text-[18px] font-bold font-display leading-[110%] text-gray-white  ">
                        Place Order
                        <span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.5 7.5L20 12M20 12L15.5 16.5M20 12H4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </button>
            </div>
        </div>

        <!-- cart details end -->
    </div>
</div>
<!-- Sign In Form End -->
