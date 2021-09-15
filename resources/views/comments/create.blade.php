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
                    <p>{{$gift[0]->price}}€</p>
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
                @if($comment->user_id == auth()->id())
                        <form action="{{route('commentaires.edit', $comment->id)}}" method="GET">
                            @csrf
                            <input type="hidden" value="{{$gift[0]->id}}" name="gift_id">
                            <button type="submit" class="btn btn-primary mb-2">Editer</button>
                        </form>
                        <form action="{{route('commentaires.destroy', $comment->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</a>
                        </form>
                    @endif
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
                <input type="hidden" value="{{$gift[0]->id}}" name="id">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
</div>

{{$commentaires->users()}}

<!-- Button trigger modal
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal 
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>-->





@endsection