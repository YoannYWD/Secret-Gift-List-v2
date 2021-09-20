@extends('app')

@section('content')

<!-- FORMULAIRE CREATION NOUVEAU CADEAU -->
<div class="container mt-5">
    <div class="row mb-5">
        <h1 class="text-center mb-4">Cadeaux pour <span class="blue">{{$grantee[0]->nickname}}</span></h1>
        <p class="intro mb-5">Tu trouveras ci dessous plusieurs <span class="yellow">choses</span> : un formulaire pour <span class="blue">proposer</span> un cadeau, la <span class="red">wishlist</span> de {{$grantee[0]->nickname}}, et plus bas la liste de tous les <span class="green">cadeaux</span> proposés !</p>

                <!-- AFFICHAGE SOUHAITS -->
                <div class="col-md-6">
                    <p class="introSmall text-center">La <span class="red">wishlist</span> de {{$grantee[0]->nickname}} :</p>
                    @foreach($wishes as $wish)
                    <p>{{$wish->wish1}}</p>
                    <p>{{$wish->wish2}}</p>
                    <p>{{$wish->wish3}}</p>
                    <p>{{$wish->wish4}}</p>
                    <p>{{$wish->wish5}}</p>
                    @endforeach
                </div>

                <div class="col-md-6">
                    <p class="introSmall text-center"><span class="blue">Propose</span> un cadeau si tu le souhaites :</p>
                    <form action="{{route('accueil.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- nom -->
                        <div class="form-group mb-3">
                            <input type="text" placeholder="Nom du cadeau" class="form-control" name="name" required autofocus>
                            @if($errors->has('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                        </div>

                        <!-- prix -->
                        <div class="form-group mb-3">
                            <input type="number" placeholder="Prix" class="form-control" name="price" min="0" required autofocus>
                            @if($errors->has('price'))
                            <span class="text-danger">{{$errors->first('price')}}</span>
                            @endif
                        </div>

                        <!-- description -->
                        <div class="form-group mb-3">
                            <input type="text" placeholder="Quelques infos supplémentaires" class="form-control" name="description" required autofocus>
                            @if($errors->has('description'))
                            <span class="text-danger">{{$errors->first('description')}}</span>
                            @endif
                        </div>

                        <!-- image -->
                        <div class="form-group mb-3">
                            <label for="formFile" class="form-label">Image</label>
                            <input class="form-control" type="file" name="image">
                        </div>

                        <div class="d-grid mx-auto">
                            <input type="hidden" name="for_user_id" value="{{$for_user_id}}">
                            <button type="submit" class="btn btnGreen btn-block">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>


        <!-- AFFICHAGE DE TOUS LES CADEAUX PROPOSES POUR CE BENEFICIAIRE -->
        <div class="row mt-5">
            
        <p class="introSmall text-center">Liste des <span class="green">cadeaux</span> :</p>
        @foreach($gifts as $gift)
        <div class="col-md-4 mt-3 mb-2">
            <div class="card giftCard text-center">
                <img src="{{$gift->image}}" class="card-img-top" alt="Image de {{$gift->name}}">
                <div class="card-body">
                    <h5 class="card-title">{{$gift->name}}</h5>
                    <p class="card-text"><span class="blue">{{$gift->price}} €</span></p>
                    <p class="card-text">{{$gift->description}}</p>
                    <form action="{{route('commentaires.create')}}" method="GET">
                        @csrf
                        <input type="hidden" value="{{$gift->id}}" name="gift_id">
                        <button type="submit" class="btn btnBlue mb-2">En discuter...</button>
                    </form>
                    <p class="card-text"><small class="text-muted"><i class="fas fa-eye"></i>1000<i class="far fa-user"></i>                        <img class="mr-3 rounded-circle" src="https://cdn0.iconfinder.com/data/icons/user-pictures/100/male-512.png" alt="Generic placeholder image" style="max-width:50px">admin<i class="fas fa-calendar-alt"></i>Jan 20, 2018</small></p>
                    @if($gift->posted_by_user_id == auth()->id())
                    <div class="card-footer">
                        <div class="row mt-2">
                            <div class="col-6">
                                <form action="{{route('accueil.edit', $gift->id)}}" method="GET">
                                    @csrf
                                    <input type="hidden" name="for_user_id" value="{{$for_user_id}}">
                                    <input type="hidden" name="id" value="{{$gift->id}}">
                                    <button type="submit" class="btnEdit">Modifier</button>
                                </form>
                            </div>
                            <div class="col-6">
                                <form action="{{route('accueil.destroy', $gift->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btnDelete">Supprimer</a>
                                </form>
                            </div>
                        </div>

                    </div>
                    @endif
                </div>

            </div>
        </div>
        @endforeach
    </div>
</div>




@endsection