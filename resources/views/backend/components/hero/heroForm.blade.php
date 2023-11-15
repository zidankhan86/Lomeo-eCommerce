<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Dropify CSS and JS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<br><br><div class="col-10 mx-auto">
    <form class="card" action="{{ route('hero.store') }}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <br><br><h3 class="card-title" style="text-align: center; display: flex; justify-content: space-between; align-items: center;">
            <strong>Create Banner</strong>
            <a href="{{ route('hero.list') }}" class="btn btn-info">
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
                    <label class="form-label"> Welcom Title</label>
                    <input type="text" value="{{ old('welcome_title') }}" name="welcome_title" class="form-control" placeholder="Welcome to lomeo">
                  </div>
                  @error('welcome_title')
                <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>

                <div class="col-md-12">
                  <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control dropify">
                  </div>
                  @error('image')
                <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Banner Title</label>
                            <input type="text" value="{{ old('title') }}" name="title" class="form-control" placeholder="Laravel Developer">

                        </div>
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
