@extends('layouts.mainlayout')
@section('content')
    <h4 class="text-center mt-5 mb-5" style="color: #ff6e14">Créer votre annonce</h4>
    <div class="container mb-5 pb-2">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            @endif
        <form method="post" action="{{ route('createAdvert') }}" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-6">
                    <div class="mb-3">
                        <label for="title" class="form-label">Titre</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Titre de l'annonce">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Description de l'annonce" rows="6"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Prix</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Prix de l'annonce">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Adresse</label>
                        <input type="text" class="form-control " id="address" name="address" placeholder="Votre adresse">
                    </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="city" class="form-label">Localisation</label>
                            <input type="text" class="form-control " id="city" name="city" placeholder="Votre ville">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Numéro de téléphone</label>
                            <input type="number" class="form-control" id="phone" name="phone" placeholder="Votre numéro de téléphone">
                        </div>
                        <div class="mb-3">
                            <label for="picture" class="form-label">Photos</label>
                            <input type="file" class="form-control" id="picture" name="picture[]" placeholder="Vos photos" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <input type="file" class="form-control" id="picture" name="picture[]" placeholder="Vos photos" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <input type="file" class="form-control" id="picture" name="picture[]" placeholder="Vos photos" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <input type="file" class="form-control" id="picture" name="picture[]" placeholder="Vos photos" accept="image/*">
                            <button type="submit" class="btn btn-primary mt-4">Valider</button>
                        </div>
                    </div>

        </div>
        </form>
    </div>

@endsection
