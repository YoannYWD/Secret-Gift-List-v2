@extends('app')

@section('content')

<div class="container mt-5">
    <div class="row mb-4">
        <h1 class="text-center">Mon profil</h1>
        <!-- FORMULAIRE MODIFICATION PROFIL-->
        <div class="col-md-4 offset-4">
            <div class="card">
                <h3 class="card-header text-center">Modifier</h3>
                <div class="card-body">
                    <form action="{{route('mon-profil.update', auth()->id())}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group mb-3">
                            <input type="text" placeholder="Nom" class="form-control" name="lastname" value="{{$user[0]->lastname}}" required autofocus>
                            @if($errors->has('lastname'))
                            <span class="text-danger">{{$errors->first('lastname')}}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" placeholder="Nom" class="form-control" name="firstname" value="{{$user[0]->firstname}}" required autofocus>
                            @if($errors->has('firstname'))
                            <span class="text-danger">{{$errors->first('firstname')}}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" placeholder="Nom" class="form-control" name="nickname" value="{{$user[0]->nickname}}" required autofocus>
                            @if($errors->has('nickname'))
                            <span class="text-danger">{{$errors->first('nickname')}}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" placeholder="Nom" class="form-control" name="email" value="{{$user[0]->email}}" required autofocus>
                            @if($errors->has('email'))
                            <span class="text-danger">{{$errors->first('email')}}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <img src="{{$user[0]->image}}" alt="Photo de {{$user[0]->nickname}}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="formFile" class="form-label">Image</label>
                            <input class="form-control" type="file" name="image">
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" placeholder="Mon 1er souhait" class="form-control" name="wish1" value="{{$user[0]->wish1}}" autofocus>
                            @if($errors->has('wish1'))
                            <span class="text-danger">{{$errors->first('wish1')}}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" placeholder="Mon 2ème souhait" class="form-control" name="wish2" value="{{$user[0]->wish2}}" autofocus>
                            @if($errors->has('wish2'))
                            <span class="text-danger">{{$errors->first('wish2')}}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" placeholder="Mon 3ème souhait" class="form-control" name="wish3" value="{{$user[0]->wish3}}" autofocus>
                            @if($errors->has('wish3'))
                            <span class="text-danger">{{$errors->first('wish3')}}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" placeholder="Mon 4ème souhait" class="form-control" name="wish4" value="{{$user[0]->wish4}}" autofocus>
                            @if($errors->has('wish4'))
                            <span class="text-danger">{{$errors->first('wish4')}}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" placeholder="Mon 5ème souhait" class="form-control" name="wish5" value="{{$user[0]->wish5}}" autofocus>
                            @if($errors->has('wish5'))
                            <span class="text-danger">{{$errors->first('wish5')}}</span>
                            @endif
                        </div>

                        <div class="d-grid mx-auto">
                            <button type="submit" class="btn btn-dark btn-block">Enregistrer les modifications</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection