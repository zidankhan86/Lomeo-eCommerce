

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Gallery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.css">

</head>
<body>

    <div class="container">

        <div class="container">
            <div class="container">
                <div class="container">
                <div class="container mt-4">
                    <h4>Product Gallery</h4><br>
                    <form action="{{ route('gallery.store') }}" class="dropzone" id="myDropzone">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                    </form><br>
                    <button type="button" class="btn btn-success" id="submit-all">Submit</button>


                </div>

            </div>
            @error('record')
            <p class="text-success">{{ $message }}</p>
            @enderror
        </div>
        </div>

    </div>

    <div class="container">
        <br><h2 style="text-align: center">Testimonial Table</h2>

        <div class="col-10 mx-auto">
            <div class="card">
              <div class="table-responsive">
                <table
        class="table table-vcenter table-mobile-md card-table">
                  <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Image</th>

                      <th class="w-1">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($images as $image)


                    <tr>
                        <tr>
                            <td data-label="Name" >{{ $image->id }}</td>
                            <td data-label="Title">
                                @foreach(unserialize($image->images) as $imageName)
                                    <img height="150px" width="150px" src="{{ url('/public/uploads', $imageName) }}" alt="gallery">
                                @endforeach
                            </td>

                      <td>
                        <div class="btn-list flex-nowrap">
                          <a href="{{ route('delete.gallery',$image->id) }}" class=" btn" style="color: red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                          </a>


                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>


                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>
    <script>
        Dropzone.autoDiscover = false;

        $(document).ready(function () {
            var myDropzone = new Dropzone("#myDropzone", {
                paramName: "images",
                maxFilesize: 4,
                acceptedFiles: "image/*",
                addRemoveLinks: true,
                autoProcessQueue: false,
                uploadMultiple: true,
            });

            $("#submit-all").on("click", function () {
                myDropzone.processQueue();
            });

            myDropzone.on("complete", function (file) {
                file.previewElement.remove();
            });

            myDropzone.on("success", function (file, response) {
                console.log(response);
                myDropzone.removeAllFiles();

                // Show success toast message
                toastr.success('Images uploaded successfully');
            });
        });
    </script>


</body>
</html>
