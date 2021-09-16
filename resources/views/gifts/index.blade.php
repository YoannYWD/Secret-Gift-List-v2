@extends('app')

@section('content')

<!-- PAGE ACCUEIL AVEC LISTE DES GROUPES VISIBLES -->
<div class="container">
    <div class="row">
        <h1 class="text-center">Bienvenue</h1>
       
        @foreach($users as $user)
            @if($user->id !== auth()->id())
                <div class="col-md-6 col-xl-4 mt-5 mb-4">
                    <div class="card ">
                        <div class="card-body text-center ">
                            <h5 class="card-title">Cadeaux pour {{$user->nickname}}</h5>
                            <img src="{{$user->image}}" alt="Photo de {{$user->nickname}}" class="mb-4 mt-4">
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