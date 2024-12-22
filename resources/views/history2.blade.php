@extends("layouts.app")

@section("content")
<div class="d-flex justify-content-center m-3 ">
    <a href="{{ route('history',[Auth::user()->id]) }}" class="text-decoration-none p-2 m-2 btn btn-outline-primary">Pembayaran</a>
    <a href="" class="text-decoration-none p-2 m-2 btn btn-primary shadow">verifikasi</a>
    <a href="{{ route('history3',[Auth::user()->id]) }}" class="text-decoration-none p-2 m-2 btn btn-outline-primary">Selesai</a>
</div>
<div class="d-flex flex-wrap justify-content-center">
    @foreach ($Pembayaran as $bayar)
    <div class="col-sm-4 m-3 shadow">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Yang Sudah di bayar: Rp.{{ $bayar->biaya }}</h5>
                <p class="card-text">Harga: {{ $bayar->product->harga }}</p>
                <p class="card-text">Menungu Verivikasi</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
