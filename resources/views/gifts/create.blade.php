@extends('app')

@section('content')

<div class="container mt-5">
    <div class="row mb-4">

        <h1 class="text-center mb-5">Liste des cadeaux pour {{$grantee[0]->nickname}}</h1>

        <!-- FORMULAIRE CREATION NOUVEAU CADEAU -->
        <div class="col-md-6">
            <div class="card">
                <h3 class="card-header text-center">Proposer un cadeau</h3>
                <div class="card-body">
                    <form action="{{route('accueil.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" placeholder="Nom" class="form-control" name="name" required autofocus>
                            @if($errors->has('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <input type="number" placeholder="Prix" class="form-control" name="price" required autofocus>
                            @if($errors->has('price'))
                            <span class="text-danger">{{$errors->first('price')}}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" placeholder="Description" class="form-control" name="description" required autofocus>
                            @if($errors->has('description'))
                            <span class="text-danger">{{$errors->first('description')}}</span>
                            @endif
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="formFile" class="form-label">Image</label>
                            <input class="form-control" type="file" name="image">
                        </div>

                        <div class="d-grid mx-auto">
                            <input type="hidden" name="posted_by_user_id" value="{{auth()->id()}}">
                            <input type="hidden" name="for_user_id" value="{{$for_user_id}}">
                            <button type="submit" class="btn btn-dark btn-block">Enregistrer</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>



        <!-- AFFICHAGE SOUHAITS -->
        <div class="col-md-6">
            <div class="card text-center">
                <h3 class="card-header">Sa wishlist</h3>
                <div class="card-body">
                    @foreach($wishes as $wish)
                    <p>{{$wish->wish1}}</p>
                    <p>{{$wish->wish2}}</p>
                    <p>{{$wish->wish3}}</p>
                    <p>{{$wish->wish4}}</p>
                    <p>{{$wish->wish5}}</p>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- AFFICHAGE DE TOUS LES CADEAUX PROPOSES POUR CET UTILISATEUR -->
        @foreach($gifts as $gift)
        <div class="col-md-4">
            <div class="card">
                <img src="{{$gift->image}}" class="card-img-top" alt="Image de {{$gift->name}}">
                <div class="card-body">
                    <h5 class="card-title">{{$gift->name}}</h5>
                    <p class="card-text">{{$gift->description}}</p>
                    <p class="card-text">{{$gift->price}}€</p>
                    <form action="{{route('commentaires.create')}}" method="GET">
                        @csrf
                        <input type="hidden" value="{{$gift->id}}" name="id">
                        <button type="submit" class="btn btn-primary mb-2">Commenter</button>
                    </form>
                    @if($gift->posted_by_user_id == auth()->id())
                        <form action="{{route('accueil.edit', $gift->id)}}" method="GET">
                            @csrf
                            <input type="hidden" name="for_user_id" value="{{$for_user_id}}">
                            <input type="hidden" name="id" value="{{$gift->id}}">
                            <button type="submit" class="btn btn-danger mb-2">Editer</button>
                        </form>
                        <form action="{{route('accueil.destroy', $gift->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</a>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>




@endsection