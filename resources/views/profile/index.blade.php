@extends('app')

@section('content')

<!-- FORMULAIRE MODIFICATION PROFIL-->
<div class="container profileContainer">
    <div class="row mb-4">
        <p class="intro">Tu peux ici <span class="red">modifier</span> toutes les informations que tu as <span class="green">enregistrées</span>. N'oublie surtout pas de compléter ta <span class="yellow">wishlist</span> pour aider ta famille !</p>
        <form action="{{route('mon-profil.update', auth()->id())}}" method="POST" enctype="multipart/form-data" class="mt-5 mb-4">
            @csrf
            @method('PATCH')
            <!-- avatar -->
            <div class="mb-2">
                <label class="form-label me-5"><p class="mt-3 mb-0">Ta photo</p></label>
                <img src="{{$user[0]->image}}" alt="Photo de {{$user[0]->nickname}}">
            </div>
            <div class="mb-3">
                <input class="form-control" type="file" name="image">
            </div> 

            <!-- nom -->
            <div class="mb-3">
                <label class="form-label"><p class="mt-3 mb-0">Ton nom</p></label>
                <input type="text" placeholder="Nom" class="form-control" name="lastname" value="{{$user[0]->lastname}}" required autofocus>
                    @if($errors->has('lastname'))
                    <span class="text-danger">{{$errors->first('lastname')}}</span>
                    @endif
            </div>

            <!-- prénom -->
            <div class="mb-3">
                <label class="form-label"><p class="mt-3 mb-0">Ton prénom</p></label>
                <input type="text" placeholder="Nom" class="form-control" name="firstname" value="{{$user[0]->firstname}}" required autofocus>
                @if($errors->has('firstname'))
                <span class="text-danger">{{$errors->first('firstname')}}</span>
                @endif
            </div>

            <!-- pseudo -->
            <div class="mb-3">
                <label class="form-label"><p class="mt-3 mb-0">Ton pseudo</p></label>
                <input type="text" placeholder="Nom" class="form-control" name="nickname" value="{{$user[0]->nickname}}" required autofocus>
                @if($errors->has('nickname'))
                <span class="text-danger">{{$errors->first('nickname')}}</span>
                @endif
            </div>


            <!-- email -->
            <div class="mb-3">
                <label class="form-label"><p class="mt-3 mb-0">Ton email</p></label>
                <input type="text" placeholder="Nom" class="form-control" name="email" value="{{$user[0]->email}}" required autofocus>
                @if($errors->has('email'))
                <span class="text-danger">{{$errors->first('email')}}</span>
                @endif
            </div>

            <!-- wish1 -->
            <div class="mb-3">
                <label class="form-label"><p class="mt-3 mb-0">La liste de tes <span class="yellow">souhaits</span></p></label>
                <input type="text" placeholder="1er souhait" class="form-control" name="wish1" value="{{$user[0]->wish1}}" autofocus>
                @if($errors->has('wish1'))
                <span class="text-danger">{{$errors->first('wish1')}}</span>
                @endif
            </div>

            <!-- wish2 -->
            <div class="mb-3">
                <input type="text" placeholder="2ème souhait" class="form-control" name="wish2" value="{{$user[0]->wish2}}" autofocus>
                @if($errors->has('wish2'))
                <span class="text-danger">{{$errors->first('wish2')}}</span>
                @endif
            </div>

            <!-- wish3 -->
            <div class="mb-3">
                <input type="text" placeholder="3ème souhait" class="form-control" name="wish3" value="{{$user[0]->wish3}}" autofocus>
                @if($errors->has('wish3'))
                <span class="text-danger">{{$errors->first('wish3')}}</span>
                @endif
            </div>

            <!-- wish4 -->
            <div class="mb-3">
                <input type="text" placeholder="4ème souhait" class="form-control" name="wish4" value="{{$user[0]->wish4}}" autofocus>
                @if($errors->has('wish4'))
                <span class="text-danger">{{$errors->first('wish4')}}</span>
                @endif
            </div>

            <!-- wish5 -->
                <div class="form-group mb-3">
                <input type="text" placeholder="5ème souhait" class="form-control" name="wish5" value="{{$user[0]->wish5}}" autofocus>
                @if($errors->has('wish5'))
                <span class="text-danger">{{$errors->first('wish5')}}</span>
                @endif
            </div>

            <div class="d-grid mx-auto">
                <button type="submit" class="btn btnProfile"><p class="mb-0">Enregistrer les modifications</p></button>
            </div>
        </form>
    </div>
</div>




@endsection