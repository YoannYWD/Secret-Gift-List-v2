@extends('app')

@section('content')


<!-- FORMULAIRE LOGIN -->
<main class="login-form">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Connexion</h3>
                    <div class="card-body">
                        <form action="{{route('userLogin')}}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="email" placeholder="Email" class="form-control" name="email" required autofocus>
                                @if($errors->has('email'))
                                <span class="text-danger">{{$errors->first('email')}}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" placeholder="Mot de passe" class="form-control" name="password" required autofocus>
                                @if($errors->has('password'))
                                <span class="text-danger">{{$errors->first('password')}}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Se souvenir de moi
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Se connecter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection