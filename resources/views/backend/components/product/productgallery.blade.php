<br><br><div class="col-10 mx-auto">
    <form class="card" action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <h3 class="card-title" style="text-align: center; display: flex; justify-content: space-between; align-items: center;">
                <strong>Create Gallery</strong>
                <a href="{{ route('product.list') }}" class="btn btn-info">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M9 14l-4 -4l4 -4"></path>
                        <path d="M5 10h11a4 4 0 1 1 0 8h-1"></path>
                    </svg> Back
                </a>
            </h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="image" class="form-label">Images</label>
                    </div>
                </div>
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="col-md-8">
                    <div class="mb-3">
                        <input type="file" id="image" name="images[]" class="form-control" style="width: 100%;" multiple>
                        @error('image')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary">+ Add</button>
        </div>
    </form>
</div>
