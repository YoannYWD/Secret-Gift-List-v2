@extends('app')

@section('content')

<form action="{{route('accueil.create')}}" method="GET">
    @csrf
    <input type="hidden" name="for_user_id" value="{{$gift->for_user_id}}">
    <button type="submit" class="btn btn-primary">Retourner à la liste des cadeaux</button>
</form>

<div class="container mt-5">
    <div class="row mb-4">

        <!-- FORMULAIRE MODIFICATION CADEAU -->
        <div class="col-md-4 offset-4">
            <div class="card">
                <h3 class="card-header text-center">Modifier le cadeau</h3>
                <div class="card-body">
                    <form action="{{route('accueil.update', $gift->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group mb-3">
                            <input type="text" placeholder="Nom" class="form-control" name="name" value="{{$gift->name}}" required autofocus>
                            @if($errors->has('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <input type="number" placeholder="Prix" class="form-control" name="price" value="{{$gift->price}}" required autofocus>
                            @if($errors->has('price'))
                            <span class="text-danger">{{$errors->first('price')}}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" placeholder="Description" class="form-control" name="description" value="{{$gift->description}}" required autofocus>
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
    </div>
</div>


@endsection