@extends("layouts.app")

@section("content")
<div class="container-md d-flex justify-content-center mt-5">
    <div class="border border-4 border-black p-5 rounded shadow">
        <div class="d-flex justify-content-center ">
            <img class="img-fluid me-4" src="{{ Vite::asset('public/storage/files/img/'.$Products->encrypted_imagename) }}" alt="" style="max-width: 500px; max-height: 500px;">
            <div>
                <p class="h3 fw-medium text-center mt-0 text-capitalize">{{ $Products->namaproduk }}</p>
                <p class="h5 fw-light mb-0 text-capitalize">Harga</p>
                <p class="h4 fw-medium text-capitalize ">{{ $Products->harga }}</p>
                <p class="h5 fw-light mb-0 text-capitalize">Stock</p>
                <p class="h4 fw-medium text-capitalize ">{{ $Products->stock }}</p>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1"
                        class="form-label h5 fw-light mb-0 text-capitalize">Deskripsi</label>
                    <textarea class="form-control fw-medium text-decoration-none bg-white " disabled
                        id="exampleFormControlTextarea1" rows="4"
                        style="width:300px;
                            resize:none;">{{ $Products->deskripsi }}</textarea>
                </div>
                <p class="text-center mt-4"><a
                        class=" mt-2 px-5 bg-primary py-2 rounded text-decoration-none link-light link-offset-2 link-underline-opacity-25 h4 fw-medium link-offset-2 "
                        href="{{ route('beli', [$Products->id]) }}">Beli</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
