@extends('app')

@section('content')

<div class="container">
    <div class="row">

        <h1 class="text-center">Liste des groupes</h1>
        
        @foreach($users as $user)
        @if($user->id !== auth()->id())
        <div class="col-3 mt-5 mb-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body text-center">
                    <h5 class="card-title">{{$user->nickname}}</h5>
                    <form action="{{route('accueil.create')}}" method="GET">
                        @csrf
                        <input type="hidden" name="for_user_id" value="{{$user->id}}">
                        <button type="submit" class="btn btn-primary">Voir les cadeaux</button>
                    </form>
                </div>
            </div>
        </div>
        @endif
        @endforeach

    </div>
</div>


@endsection