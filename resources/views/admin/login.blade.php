@extends('layouts.loadapp')
@section('admin_content')
<div class="container-md d-flex justify-content-center mt-5">
    <div class="border border-4 border-black p-5 rounded shadow">
        <img src="{{ Vite::asset('resources/images/Logo.png') }}" alt="logo">
        <div class="mt-4">
            <P class="h3 fw-medium mb-3">Masuk Admin!</P>
            <form method="POST" action="{{ route('loginadmin') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember')
                            ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <div class="d-flex justify-content-center mb-3">
                    <button type="submit" class="btn btn-primary px-5">
                        {{ __('Masuk') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
