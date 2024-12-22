@extends("layouts.app")

@section("content")
<div class="d-flex justify-content-center m-3 ">
    <a href="" class="text-decoration-none p-2 m-2 btn btn-primary shadow">Pembayaran</a>
    <a href="{{ route('history2',[Auth::user()->id]) }}" class="text-decoration-none p-2 m-2 btn btn-outline-primary">verifikasi</a>
    <a href="{{ route('history3',[Auth::user()->id]) }}" class="text-decoration-none p-2 m-2 btn btn-outline-primary">Selesai</a>
</div>
<div class="d-flex flex-wrap justify-content-center">
    @foreach ($Pembayaran as $bayar)
        <div class="col-sm-4 m-3 shadow">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pembayaran {{ $bayar->product->namaproduk }}</h5>
                    <p class="card-text">Jumlah yang harus di bayar: Rp.{{ $bayar->biaya }}</p>
                    <p class="card-text">batas pembayaran 1x24 jam</p>
                    <a href="#" class="btn btn-primary">Cancel</a>
                    <a href="{{ route('bayar', [$bayar->id]) }}" class="btn btn-primary">Bayar</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
