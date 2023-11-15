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
                    </div><br>
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
                        <svg id="create-icon-show" onclick="CreatePasswordIcon()" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 4.24902C4.5 4.24902 1.5 11.9999 1.5 11.9999C1.5 11.9999 4.5 19.749 12 19.749C19.5 19.749 22.5 11.9999 22.5 11.9999C22.5 11.9999 19.5 4.24902 12 4.24902V4.24902Z"
                            stroke="#272343" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path
                            d="M12 15.75C12.9946 15.75 13.9484 15.3549 14.6517 14.6517C15.3549 13.9484 15.75 12.9946 15.75 12C15.75 11.0054 15.3549 10.0516 14.6517 9.34835C13.9484 8.64509 12.9946 8.25 12 8.25C11.0054 8.25 10.0516 8.64509 9.34835 9.34835C8.64509 10.0516 8.25 11.0054 8.25 12C8.25 12.9946 8.64509 13.9484 9.34835 14.6517C10.0516 15.3549 11.0054 15.75 12 15.75V15.75Z"
                            stroke="#272343" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    </span>
                </div>
                <div class="relative mb-4">
                    <input type="password" placeholder="Confirm Password" name="password_confirmation"
                        class="form_password focus:outline-none focus:ring-2 focus:ring-accents font-display transition duration-300 ease-in-out"
                        id="myInput">
                    <span class="absolute top-[17px] right-5 cursor-pointer ">
                        <svg id="create-icon-show" onclick="CreatePasswordIcon()" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 4.24902C4.5 4.24902 1.5 11.9999 1.5 11.9999C1.5 11.9999 4.5 19.749 12 19.749C19.5 19.749 22.5 11.9999 22.5 11.9999C22.5 11.9999 19.5 4.24902 12 4.24902V4.24902Z"
                                    stroke="#272343" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M12 15.75C12.9946 15.75 13.9484 15.3549 14.6517 14.6517C15.3549 13.9484 15.75 12.9946 15.75 12C15.75 11.0054 15.3549 10.0516 14.6517 9.34835C13.9484 8.64509 12.9946 8.25 12 8.25C11.0054 8.25 10.0516 8.64509 9.34835 9.34835C8.64509 10.0516 8.25 11.0054 8.25 12C8.25 12.9946 8.64509 13.9484 9.34835 14.6517C10.0516 15.3549 11.0054 15.75 12 15.75V15.75Z"
                                    stroke="#272343" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
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
