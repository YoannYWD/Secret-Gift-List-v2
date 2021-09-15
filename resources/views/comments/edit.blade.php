@extends('app')

@section('content')

<form action="{{route('commentaires.create')}}" method="GET">
    @csrf
    <input type="hidden" name="gift_id" value="{{$gift_id}}">
    <button type="submit" class="btn btn-primary">Retourner aux commentaires</button>
</form>



<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <form method="POST" action="{{route('commentaires.update', $comment->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
                <div class="mb-3">
                  <label>Votre commentaire</label>
                  <input type="text" name="content" class="form-control" placeholder="Lachez votre plus beau com'" value="{{$comment->content}}">
                </div>
                <input type="hidden" name="gift_id" value="{{$gift_id}}">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
</div>


@endsection