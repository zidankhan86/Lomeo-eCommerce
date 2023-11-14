@extends('frontend.layout.app')

@section('content')

<!-- Sign Up Form Start -->
<div class="container py-20">
    <div class="sign_in">
        <h2 class="text-center text-gray-black xl:text-[32px] text-[20px] font-semibold font-display">Sign Up</h2>
        <div class="form">
            <form action="{{ route('register.store') }}" class="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="xl:flex flex-wrap justify-between items-center mb-4">
                    <div class="xl:w-[284px] w-full">
                        <input type="text" placeholder="First Name" name="name"
                            class="input-box focus:outline-none focus:ring-2 focus:ring-accents font-display transition duration-300 ease-in-out">
                    </div>
                    <div class="xl:w-[284px] w-full">
                        <input type="text" placeholder="Last Name" name="last_name"
                            class="input-box focus:outline-none focus:ring-2 focus:ring-accents font-display transition duration-300 ease-in-out">
                    </div>
                </div>
                <div class="mb-4">
                    <input type="email" placeholder="Email" name="email"
                        class="input-box focus:outline-none focus:ring-2 focus:ring-accents font-display transition duration-300 ease-in-out">
                </div>
                <div class="relative mb-4">
                    <input type="password" placeholder="Create Password" name="password"
                        class="form_password focus:outline-none focus:ring-2 focus:ring-accents font-display transition duration-300 ease-in-out"
                        id="CreatePasswordInput">
                    <span class="absolute top-[17px] right-5 cursor-pointer ">
                        <!-- Your eye icons for password visibility -->
                    </span>
                </div>
                <div class="relative mb-4">
                    <input type="password" placeholder="Confirm Password" name="password_confirmation"
                        class="form_password focus:outline-none focus:ring-2 focus:ring-accents font-display transition duration-300 ease-in-out"
                        id="myInput">
                    <span class="absolute top-[17px] right-5 cursor-pointer ">
                        <!-- Your eye icons for password visibility -->
                    </span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="cursor-pointer">
                        <label for="wp-comment-cookies-consent">
                            <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent"
                                class="cursor-pointer" type="checkbox" value="yes">
                            Accept all terms & conditions
                        </label>
                    </div>
                </div>
                <button class="form_btn w-full" type="submit">
                    Sign Up
                    <span>
                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 7.5L20.5 12M20.5 12L16 16.5M20.5 12H4.5" stroke="white" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </button>
            </form>
            <div class="font-display font-normal text-[14px] leading-[110%] text-gray-black mt-6 text-center">
                Already have an account? <a href="{{ route('login.page') }}"
                    class="text-dark-accents font-display font-medium text-[14px] leading-[110%]"> Sign In</a>
            </div>
        </div>
    </div>
</div>
<!-- Sign Up Form End -->

@endsection
