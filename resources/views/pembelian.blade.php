@extends('layouts.app')

@section('content')
<div class="container-md d-flex justify-content-center mt-5">
    <div class="border border-4 border-black p-5 rounded shadow">
        <div class="d-flex justify-content-center ">
            <img class="img-fluid me-4" src="{{ Vite::asset('public/storage/files/img/'.$Products->encrypted_imagename) }}" alt="" style="max-width: 500px; max-height: 500px;">
            <div class="mt-4">
                <form action="{{ route('pembayaran', [$Products->id] ) }}" method="POST">
                    @csrf
                    @method('put')
                    <p class="h2 fw-bold text-center mb-5">Pembelian {{ $Products->namaproduk }}</p>
                    <div class="justify-content-center d-flex">
                        <div class="me-4">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" aria-describedby="emailHelp"
                                    required name="alamat" value="{{ old('alamat') }}">
                                @error('alamat')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">No HP</label>
                                <input type="text" class="form-control" id="no" required name="no"
                                    value="{{ old('no') }}">
                                @error('no')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Penerima</label>
                                <input type="text" class="form-control" id="nama_penerima"
                                    value="{{ Auth::user()->name }}" required name="nama_penerima">
                                @error('nama_penerima')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Jumlah</label>
                                <input type="text" class="form-control" id="jumlah" name="jumlah" required
                                    value="{{ old('jumlah') }}">
                                @error('jumlah')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <select class="form-select mb-0" aria-label="Default select example" name="metode" id="metode"
                        required>
                        @foreach ($metod as $metode)
                            <option value="{{ $metode->id }}" {{ old('metode') == $metode-> id ? 'selected' : '' }}>{{ $metode->metod }}</option>
                        @endforeach
                    </select>
                    @error('metode')
                    <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                    <div class="mx-0 invisible">
                        <input type="text" class="form-control" id="iduser" value="{{ Auth::user()->id }}" required
                            name="iduser">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary px-5">Beli</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
