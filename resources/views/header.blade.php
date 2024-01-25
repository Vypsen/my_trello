@extends('app')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-dark p-1 flex-md-row" style="background-color: #1775ab; box-shadow: 0px 5px 8px -4px rgba(34, 60, 80, 1);">
        <div class="container-fluid mx-5">
            <a class="navbar-brand" href="/">Trello</a>

            <div class="ms-5 collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @hasSection('project_name')
                        <li class="text-white nav-item">
                            <h1 class="m-0">/</h1>
                        </li>
                        <li class="ms-5 nav-item d-flex">
                            <h4 class="m-0 align-items-center ms-2 d-flex fw-semibold text-white"> @yield('project_name') </h4>
                        </li>
                    @endif
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

    <div>
        <div class="">
            @yield('app')
        </div>
    </div>
@endsection
