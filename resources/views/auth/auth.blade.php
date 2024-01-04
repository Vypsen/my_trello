@extends('app')

@section('content')
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            Trello
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">

            </ul>

            <ul class="navbar-nav ms-auto">
                @guest
                    @if (Route::has('login.post'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login.post') }}">Вход</a>
                        </li>
                    @endif

                    @if (Route::has('register.post'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register.post') }}">Зарегистрироваться</a>
                        </li>
                    @endif

                @endguest
            </ul>
        </div>
    </div>
</nav>
    <div class="py-5">
        @yield('auth')
    </div>
@endsection
