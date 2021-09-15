@extends('app')

@section('content')

<form action="{{route('accueil.create')}}" method="GET">
    @csrf
    <input type="hidden" name="for_user_id" value="{{$gift[0]->for_user_id}}">
    <button type="submit" class="btn btn-primary">Retourner à la liste</button>
</form>

<div class="container">
    <div class="row">
        <div class="col-6 offset-3 mt-5 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="{{$gift[0]->image}}" class="card-img-top" alt="Image de {{$gift[0]->name}}" style="height: 18rem;">
                <div class="card-body text-center">
                    <h5 class="card-title">{{$gift[0]->name}}</h5>
                    <p>{{$gift[0]->price}}</p>
                    <p>{{$gift[0]->description}}</p>
                    <p>Posté par {{$gift[0]->user_nickname}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($comments as $comment)
            <div class="col-6 offset-3 mb-3">
                <p>{{$comment->content}}</p>
                <p><i>Posté par {{$comment->user_nickname}} le {{$comment->created_at}}</i></p>
            </div>
        @endforeach
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <form method="POST" action="{{route('commentaires.store')}}" enctype="multipart/form-data">
            @csrf
                <div class="mb-3">
                  <label>Votre commentaire</label>
                  <input type="text" name="content" class="form-control" placeholder="Lachez votre plus beau com'">
                </div>

                <input type="hidden" value="{{auth()->id()}}" name="user_id">
                <input type="hidden" value="{{$gift[0]->id}}" name="id">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
</div>


@endsection