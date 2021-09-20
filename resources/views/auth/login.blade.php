@extends('app')

@section('content')


<!-- FORMULAIRE LOGIN -->
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <p class="intro text-center"><span class="yellow">Connecte</span>-toi !</p>
                <form action="{{route('userLogin')}}" method="POST">
                    @csrf
                    <!-- email -->
                    <div class="mb-3">
                        <input type="email" placeholder="Email" class="form-control" name="email" required autofocus>
                        @if($errors->has('email'))
                        <span class="text-danger">{{$errors->first('email')}}</span>
                        @endif
                    </div>

                    <!-- mot de passe -->
                    <div class="mb-3">
                        <input type="password" placeholder="Mot de passe" class="form-control" name="password" required autofocus>
                        @if($errors->has('password'))
                        <span class="text-danger">{{$errors->first('password')}}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" class="me-2">Se souvenir de moi
                            </label>
                        </div>
                    </div>

                    <div class="d-grid mx-auto">
                        <button type="submit" class="btn btnGreen btn-block">Se connecter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection