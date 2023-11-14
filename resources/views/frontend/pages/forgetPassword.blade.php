@extends('frontend.layout.app')

@section('content')

 <!--Forget Password Form Start -->
 <div class="container py-20">
    <div class="sign_in">
        <h2 class="text-center text-gray-black xl:text-[32px] text-[20px] font-semibold font-display">Forget Password</h2>
        <p class="xl:text-center text-center text-[#636270] text-[16px] font-normal leading-[150%] font-display pb-6 xl:w-[408px] mx-auto">
            Please enter your email address, and we'll send you a link to reset your password.</p>
        <div class="form">
            <form action="{{ route('password.email') }}" method="POST" class="">
                @csrf
                <div>
                    <input type="text" placeholder="Email" name="email" value="{{ old('email') }}"
                        class="pl-5 py-[17px] w-full bg-[#F0F2F3] rounded-lg focus:outline-none  focus:ring-2 focus:ring-accents font-display transition duration-300 ease-in-out pr-5">
                </div>
                <button class="form_btn w-full">
                    {{ __('Send Password Reset Link') }}
                    <span>
                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 7.5L20.5 12M20.5 12L16 16.5M20.5 12H4.5" stroke="white" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </button>
            </form>
            <div class="font-display font-normal text-[14px] leading-[110%] text-gray-black mt-6 text-center"><a href="sign-in.html"
                class="text-dark-accents font-display font-medium text-[14px] leading-[110%]"> Back to Sign In</a></div>
        </div>
    </div>
</div>
<!--Forget Password Form End -->

@endsection
