

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
