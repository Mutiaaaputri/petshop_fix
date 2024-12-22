@php
$currentRouteName = Route::currentRouteName();
@endphp

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(150, 190, 252, 0.5);">
    <div class="container-md">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ Vite::asset('resources/images/Logo.png') }}" width="115" height="30" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link{{ $currentRouteName == 'index' ? ' active' : '' }} fw-bold" href="{{ route('index') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ $currentRouteName == 'catalog' ? ' active' : '' }} fw-bold" href="{{ route('catalog') }}">Produk</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-bold" href="{{ route('login') }}">{{ __('Masuk') }}</a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-bold" href="{{ route('register') }}">{{ __('Daftar') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark fw-bold" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('history',[Auth::user()->id]) }}">
                                {{ __('History') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
