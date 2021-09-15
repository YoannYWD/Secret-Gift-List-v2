<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGL v1.0</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- STYLE -->
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }} ">



</head>
<body>

<nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #97B6C8;">
    <div class="container">
        <a class="navbar-brand mr-auto" href="{{route('accueil.index')}}">SGL</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            @guest
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Se connecter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('registration')}}">S'enregistrer</a>
                </li>
            </ul>
            @else
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('accueil.index')}}">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('mon-profil.index')}}">Mon profil</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <span class="navbar-text">
                    Bonjour {{Auth::user()->nickname}},
                </span>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('signout')}}">se déconnecter</a>
                </li>

            </ul>
            @endguest
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-4 offset-4 text-center">
            @if(session()->get("success"))
                <div class="alert alert-success">
                    {{ session()->get("success") }}
                </div><br />
            @endif
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-4 offset-4 text-center">
            @if(session()->get("alert"))
                <div class="alert alert-danger">
                    {{ session()->get("alert") }}
                </div><br />
            @endif
        </div>
    </div>
</div>

<div class="container">
    @yield("content")
</div>




    <!-- BOOTSTRAP -->   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
</body>
</html>