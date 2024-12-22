@extends("layouts.app")

@section("content")
<div class="d-flex justify-content-center m-3 ">
    <a href="{{ route('history',[Auth::user()->id]) }}"
        class="text-decoration-none p-2 m-2 btn btn-outline-primary">Pembayaran</a>
    <a href="{{ route('history2',[Auth::user()->id]) }}" class="text-decoration-none p-2 m-2 btn btn-outline-primary">verifikasi</a>
    <a href="" class="text-decoration-none p-2 m-2 btn btn-primary shadow">Selesai</a>
</div>
<div class="d-flex flex-wrap justify-content-center">
    @foreach ($Pembayaran as $bayar)
    <div class="col-sm-4 m-3 shadow">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Barang akan segera di kirim ke {{ $bayar->nama_penerima }}</h5>
                <p class="card-title">Alamat: {{ $bayar->alamat }}</p>
                <p class="card-title"></p>
                <p class="card-text btn btn-primary">Pembayaran Sukses</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
