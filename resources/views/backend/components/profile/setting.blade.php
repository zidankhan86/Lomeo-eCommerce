<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Dropify CSS and JS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<div class="page">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Account Settings
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="row g-0">

                    <div class="col-3 d-none d-md-block border-end">
                        <!-- Sidebar content goes here -->
                        <h2 style="text-align: center"> My Account</h2>
                        <hr>
                        <h3 style="margin-left: 20px;"><a href="{{ route('change.password') }}">Change Password</a></h3>

                    </div>


                    <div class="col d-flex flex-column">
                        <div class="card-body">
                            <h2 class="mb-4">My Account</h2>
                            <h3 class="card-title">Profile Details</h3>
                            <form action="{{ route('registration.update', auth()->user()->id) }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row align-items-center">
                                    <label for="image-upload" style="cursor: pointer;">

                                       <img height="100px" src="{{ asset('public/uploads/' . auth()->user()->image) }}" alt="Profile Photo">
                                       <p class="label-txt">Choose profile photo</p>
                                       <input type="file" id="image" name="image" class="form-control dropify" style=" width: 100%;">
                                    </label>
                                </div>

                                <h3 class="card-title mt-4">Profile</h3>
                                <div class="row g-3">
                                    <div class="col-md">
                                        <div class="form-label">Name</div>
                                        <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                                    </div>
                                    <div class="col-md">
                                        <div class="form-label">Email</div>
                                        <input type="text" class="form-control" name="email" value="{{ auth()->user()->email }}">
                                    </div>
                                    <div class="col-md">
                                        <div class="form-label">Mobile</div>
                                        <input type="text" class="form-control" value="{{ auth()->user()->phone }}" name="phone">
                                    </div>
                                </div>





                                <div class="card-footer bg-transparent mt-auto">
                                    <div class="btn-list justify-content-end">
                                        <a href="#" class="btn">
                                            Cancel
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.dropify').dropify();
    });
</script>
