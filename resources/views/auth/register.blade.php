@extends('auth.auth')

@section('auth')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Регистрация</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('register.post')}}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <input id="name" placeholder="Имя" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <input id="email" placeholder="E-mail" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password"
                                           placeholder="Пароль">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-6 d-grid mx-auto">
                                    <button type="submit" class="btn btn-success">
                                        Зарегистрироваться
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
