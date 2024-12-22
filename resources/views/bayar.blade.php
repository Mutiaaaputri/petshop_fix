@extends("layouts.app")

@section("content")
<p class="display-4 fw-bold text-center my-4">Segera Lakukan Pembayaran</p>
<div class="container-md d-flex justify-content-center mt-5">
    <div class="border border-4 border-black p-3 rounded shadow">
        <div class="text-center">
            <p class="h3 fw-medium text-center my-4">Pembayaran Melalui Virtual Accoun</p>
            <p class="h4 fw-normal text-center ">{{ $bayar->metode->metod }}</p>
            <p class="h4 fw-normal text-center ">No Virtual Accoun</p>
            <p class="h3 fw-normal text-center p-2 rounded text-bg-primary">{{ $vc }}</p>
        </div>
        <form  action="{{ route('uplodbukti', [$bayar->id] ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mt-5">
                <label for="formFile" class="form-label">Upload Bukti Pembayaran</label>
                <input class="form-control" type="file" id="bukti" name="bukti">
                @error('bukti')
                <div class="text-danger"><small>{{ $message }}</small></div>
                @enderror
            </div>
            <div class="mx-0 invisible">
                <input type="text" class="form-control" id="iduser" value="{{ Auth::user()->id }}" required name="iduser">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary px-5">Upload</button>
            </div>
        </form>
    </div>
</div>
@endsection
