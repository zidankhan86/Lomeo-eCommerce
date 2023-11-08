<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Dropify CSS and JS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>


<br><br><br><div class="col-10 mx-auto" >
    <form class="card" action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <br><br><h3 class="card-title" style="text-align: center; display: flex; justify-content: space-between; align-items: center;">
                <strong>Create Category</strong>
                <a href="{{ route('category.list') }}" class="btn btn-info">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M9 14l-4 -4l4 -4"></path>
                        <path d="M5 10h11a4 4 0 1 1 0 8h-1"></path>
                     </svg> Back
                </a>
            </h3><br><br>


            <div class="row row-cards">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Type Name</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <input type="text" id="name" value="{{ old('name') }}" name="name" class="form-control" style="width: 100%;" placeholder="Type Name">
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <input type="file" id="image" name="image" class="form-control dropify" style=" width: 100%;">
                            @error('image')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <select name="status" id="status" class="form-control" style=" width: 100%;">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary">+ Add</button>
        </div>
    </form>

</div>
<script>
    $(document).ready(function () {
        $('.dropify').dropify();
    });
</script>
