@extends('app')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top flex-md-row" style="background-color: #1775ab; box-shadow: 0px 5px 8px -4px rgba(34, 60, 80, 1);">
        <div class="container-fluid mx-5">
            <a class="navbar-brand" href="/">Trello</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <div class="d-flex dropdown">
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            </div>
                        </div>
                    </li>

                </ul>
                <div class="d-flex dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                       data-bs-toggle="dropdown">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выйти
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div style="background-color: #ececff" class="min-vh-100">
        <div style="padding: 10vh 0;" class="container-fluid">
            @yield('app')
        </div>
    </div>
@endsection
