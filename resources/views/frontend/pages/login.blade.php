@extends('frontend.layout.app')

@section('content')

<!-- Sign In Form Start -->
<div class="container py-20">
    <div class="sign_in">
        <h2 class="text-center text-gray-black xl:text-[32px] text-[20px] font-semibold font-display">Sign In</h2>
        <div class="form">
            <form action="{{ route('login.authenticate') }}" method="post">
                @csrf
                <div class="mb-4">
                    <input type="text" placeholder="Email" name="email"
                        class="input-box focus:outline-none focus:ring-2 focus:ring-accents font-display transition duration-300 ease-in-out">
                </div>

                <div class="relative">
                    <input type="password" placeholder="Password" name="password"
                        class="form_password focus:outline-none focus:ring-2 focus:ring-accents font-display transition duration-300 ease-in-out"
                        id="myInput">
                    <span class="absolute top-[17px] right-5 cursor-pointer ">
                        <svg id="icon-show" onclick="PasswordIcon()" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 4.24902C4.5 4.24902 1.5 11.9999 1.5 11.9999C1.5 11.9999 4.5 19.749 12 19.749C19.5 19.749 22.5 11.9999 22.5 11.9999C22.5 11.9999 19.5 4.24902 12 4.24902V4.24902Z"
                                stroke="#272343" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M12 15.75C12.9946 15.75 13.9484 15.3549 14.6517 14.6517C15.3549 13.9484 15.75 12.9946 15.75 12C15.75 11.0054 15.3549 10.0516 14.6517 9.34835C13.9484 8.64509 12.9946 8.25 12 8.25C11.0054 8.25 10.0516 8.64509 9.34835 9.34835C8.64509 10.0516 8.25 11.0054 8.25 12C8.25 12.9946 8.64509 13.9484 9.34835 14.6517C10.0516 15.3549 11.0054 15.75 12 15.75V15.75Z"
                                stroke="#272343" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <svg class="mt-[10px]" id="icon-hide" onclick="PasswordIcon()" width="20" height="10"
                            viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.858 2.93481L18.9963 6.63906" stroke="#272343" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12.4547 4.99353L13.1215 8.77578" stroke="#272343" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M7.53701 4.99133L6.86951 8.77433" stroke="#272343" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M3.13825 2.9325L0.989502 6.6525" stroke="#272343" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M1 0.83252C2.575 2.78252 5.4655 5.25002 10 5.25002C14.5345 5.25002 17.4235 2.78252 19 0.83252"
                                stroke="#272343" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="cursor-pointer inline-flex items-center">
                        <input id="wp-comment-cookies-consent" name="remember" class="cursor-pointer" type="checkbox"
                            value="yes">
                        <label for="wp-comment-cookies-consent">Remember me</label>
                    </div>
                    <a href="{{ route('password.request') }}"
                        class="text-dark-accents text-[14px] font-medium line-height-[110%]">Forget Password</a>
                </div>
                <button class="form_btn w-full" type="submit">
                    Sign In
                    <span>
                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 7.5L20.5 12M20.5 12L16 16.5M20.5 12H4.5" stroke="white" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </button>

            </form>
            <div
                class="font-display font-normal text-[14px] leading-[110%] text-gray-black mt-6 text-center">
                Don’t have an account? <a href="{{ route('register.page') }}"
                    class="text-dark-accents font-display font-medium text-[14px] leading-[110%]"> Sign Up</a>
            </div>
            <div class="card-body">
            <div class="flex">
    <div class="w-1/2">
        <a href="{{ url('auth/github') }}" class="btn w-full text-dark-accents font-display font-medium text-[14px] leading-[110%]">
            <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-github" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" /></svg>
            Login with Github
        </a>
    </div>
    <div class="w-1/2">
        <a href="#" class="btn w-full text-dark-accents font-display font-medium text-[14px] leading-[110%]">
            <!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-twitter" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z" /></svg>
            Login with Twitter
        </a>
    </div>
</div>

          </div>
        </div>
    </div>
</div>
<!-- Sign In Form End -->

@endsection
