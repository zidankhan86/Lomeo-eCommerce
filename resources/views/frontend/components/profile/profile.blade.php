<!-- Account Setting Start -->
<div id="account_settings">
    <div class="container px-3 md:px-5 xl:px-0 py-10">
        <div class="accout-setting flex flex-col xl:flex-row gap-6">
            <!-- account inforamation start -->
            <div class="box xl:w-[536px]">
                <div class="w-full ">
                    <div class="p-6">
                        <h2 class="text-start xl:text-2xl acc-title text-[22px] text-[#272343] font-medium mb-6 font-display">Account Information</h2>
                        <form action="{{ route('account.Info',auth()->user()->id) }}" method="POST">
                            @csrf
                        <div class="flex flex-col sm:flex-row gap-5 items-center mb-5">
                            <div class="w-full">
                                <input type="text" name="name" value="{{ auth()->user()->name }}" class="input-box focus:outline-none focus:ring-2 focus:ring-accents transition duration-300 ease-in-out">
                            </div>
                            <div class="w-full">
                                <input type="text" name="last_name" value="{{ auth()->user()->last_name }}" class="input-box focus:outline-none focus:ring-2 focus:ring-accents font-display transition duration-300 ease-in-out">
                            </div>
                        </div>

                        <div class="w-full mb-5">
                            <input type="email" name="email" value="{{ auth()->user()->email }}" class="input-box focus:outline-none  focus:ring-2 focus:ring-accents font-display transition duration-300 ease-in-out">
                        </div>
                        <div class="w-full mb-5">
                            <input type="tel" name="phone" value="{{ auth()->user()->phone}}" class="input-box focus:outline-none  focus:ring-2 focus:ring-accents font-display transition duration-300 ease-in-out">
                        </div>
                        <button type="submit" class="btn-primary">Save Changes</button>
                    </div>
                </form>
                </div>
            </div>
            <!-- account inforamation end -->

            <div class="flex flex-col md:flex-row gap-6">
                <!-- user password change start -->
                <div class="box xl:w-[424px]">
                    <div class="">
                        <div class="p-6">
                            <h2 class="text-start xl:text-2xl acc-title text-[22px] text-[#272343] font-medium mb-6 font-display">Change Password</h2>

                            <div class="relative">
                                <!-- input-box focus:outline-none focus:ring-2 focus:ring-accents transition duration-300 ease-in-out -->

                                <input type="password" placeholder="Current passowrd" class="form_password focus:outline-none focus:ring-2 focus:ring-accents font-display transition duration-300 ease-in-out" id="CurrentPasswordInput" name="password">
                                <span class="absolute top-[17px] right-5 cursor-pointer ">

                                    <svg id="current-icon-show" onclick="currentPasswordIcon()" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 4.24902C4.5 4.24902 1.5 11.9999 1.5 11.9999C1.5 11.9999 4.5 19.749 12 19.749C19.5 19.749 22.5 11.9999 22.5 11.9999C22.5 11.9999 19.5 4.24902 12 4.24902V4.24902Z" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M12 15.75C12.9946 15.75 13.9484 15.3549 14.6517 14.6517C15.3549 13.9484 15.75 12.9946 15.75 12C15.75 11.0054 15.3549 10.0516 14.6517 9.34835C13.9484 8.64509 12.9946 8.25 12 8.25C11.0054 8.25 10.0516 8.64509 9.34835 9.34835C8.64509 10.0516 8.25 11.0054 8.25 12C8.25 12.9946 8.64509 13.9484 9.34835 14.6517C10.0516 15.3549 11.0054 15.75 12 15.75V15.75Z" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <svg id="current-icon-hide" onclick="currentPasswordIcon()" width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.858 2.93481L18.9963 6.63906" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M12.4547 4.99353L13.1215 8.77578" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M7.53701 4.99133L6.86951 8.77433" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M3.13825 2.9325L0.989502 6.6525" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M1 0.83252C2.575 2.78252 5.4655 5.25002 10 5.25002C14.5345 5.25002 17.4235 2.78252 19 0.83252" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>

                            <div class="relative">
                                <input type="password" placeholder="New passowrd" class="form_password focus:outline-none focus:ring-2 focus:ring-accents font-display transition duration-300 ease-in-out" id="CreatePasswordInput" name="password">
                                <span class="absolute top-[17px] right-5 cursor-pointer select-none ">

                                    <svg id="create-icon-show" onclick="CreatePasswordIcon()" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 4.24902C4.5 4.24902 1.5 11.9999 1.5 11.9999C1.5 11.9999 4.5 19.749 12 19.749C19.5 19.749 22.5 11.9999 22.5 11.9999C22.5 11.9999 19.5 4.24902 12 4.24902V4.24902Z" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M12 15.75C12.9946 15.75 13.9484 15.3549 14.6517 14.6517C15.3549 13.9484 15.75 12.9946 15.75 12C15.75 11.0054 15.3549 10.0516 14.6517 9.34835C13.9484 8.64509 12.9946 8.25 12 8.25C11.0054 8.25 10.0516 8.64509 9.34835 9.34835C8.64509 10.0516 8.25 11.0054 8.25 12C8.25 12.9946 8.64509 13.9484 9.34835 14.6517C10.0516 15.3549 11.0054 15.75 12 15.75V15.75Z" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                    <svg id="create-icon-hide" onclick="CreatePasswordIcon()" width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.858 2.93481L18.9963 6.63906" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M12.4547 4.99353L13.1215 8.77578" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M7.53701 4.99133L6.86951 8.77433" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M3.13825 2.9325L0.989502 6.6525" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M1 0.83252C2.575 2.78252 5.4655 5.25002 10 5.25002C14.5345 5.25002 17.4235 2.78252 19 0.83252" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>

                            <div class="relative">
                                <input type="password" placeholder="Confirm passowrd" class="form_password focus:outline-none focus:ring-2 focus:ring-accents font-display transition duration-300 ease-in-out" id="myInput" name="password">
                                <span class="absolute top-[17px] right-5 cursor-pointer ">
                                    <svg id="icon-show" onclick="PasswordIcon()" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 4.24902C4.5 4.24902 1.5 11.9999 1.5 11.9999C1.5 11.9999 4.5 19.749 12 19.749C19.5 19.749 22.5 11.9999 22.5 11.9999C22.5 11.9999 19.5 4.24902 12 4.24902V4.24902Z" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M12 15.75C12.9946 15.75 13.9484 15.3549 14.6517 14.6517C15.3549 13.9484 15.75 12.9946 15.75 12C15.75 11.0054 15.3549 10.0516 14.6517 9.34835C13.9484 8.64509 12.9946 8.25 12 8.25C11.0054 8.25 10.0516 8.64509 9.34835 9.34835C8.64509 10.0516 8.25 11.0054 8.25 12C8.25 12.9946 8.64509 13.9484 9.34835 14.6517C10.0516 15.3549 11.0054 15.75 12 15.75V15.75Z" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <svg id="icon-hide" onclick="PasswordIcon()" width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.858 2.93481L18.9963 6.63906" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M12.4547 4.99353L13.1215 8.77578" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M7.53701 4.99133L6.86951 8.77433" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M3.13825 2.9325L0.989502 6.6525" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M1 0.83252C2.575 2.78252 5.4655 5.25002 10 5.25002C14.5345 5.25002 17.4235 2.78252 19 0.83252" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>


                            <button class="btn-primary">Save Changes</button>
                        </div>
                    </div>
                </div>
                <!-- user password change end -->

                <!-- user profile change start -->
                <div class="box xl:w-[312px]">
                    <div class="">
                        <div class="p-6">
                            <h2 class="xl:text-2xl acc-title text-[22px]  text-[#272343] font-medium mb-6 font-display text-center">Change Profile Photo</h2>

                            <div class="pb-[26px] mx-auto">
                                <img class="w-[150px] h-[150px] rounded-full mx-auto object-cover" src="./public/assets/images/all-img/profile-photo.png" alt="image description" id="blah">
                            </div>

                            <div class="flex justify-center pb-3">

                                <input type="file" id="real-file" hidden="hidden" onchange="readURL(this);"  accept=".jpeg, .doc, .docx, .xls, .xlsx, .txt, .jpg, .png, .gif"  />
                                <button type="button" id="custom-button" class="flex gap-3 items-center transition-all duration-300 hover:bg-[#272343] bg-accents text-white text-base font-semibold py-[17px] px-6 rounded-lg font-display">
                                    <span class="">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 17H17.5C19.9853 17 22 14.9853 22 12.5C22 10.0147 19.9853 8 17.5 8H17.293C16.64 5.6915 14.5176 4 12 4C9.48245 4 7.35996 5.6915 6.70703 8H6.5C4.01472 8 2 10.0147 2 12.5C2 14.9853 4.01472 17 6.5 17H8" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M12 19.5V9.5M12 9.5L8.5 13M12 9.5L15.5 13" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>Upload Now</button>

                            </div>
                            <p class="text-center text-[#636270] text-sm font-display">JPG or PNG. max size of 500KB</p>
                        </div>
                    </div>
                </div>
                <!-- user profile change end -->
            </div>

        </div>
    </div>
</div>
<!-- Account Setting End -->
