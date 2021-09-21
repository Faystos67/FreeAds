@extends('layouts.mainlayout')
@section('content')
    @if (session()->has('success.message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success.message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @foreach ($errors->all() as $error)
        <div class="text-center">
            <p class="text-danger" style="line-height: 1; font-size: medium">{{ $error }}</p>
        </div>
    @endforeach
    <div class="container rounded border border-1 mt-5 mb-5 pb-5" style="border-color: #dee2e6; max-height: 100%">
        <div class="row">
            <h3 class="text-center mt-2 mb-2">Mon compte</h3>
            <div class="col-6 w-50 border-end mt-4 pt-2">
                <h4 class="mb-5 text-center">Changer le mot de passe</h4>
                <form method="POST" action="{{ route('updatePassword') }}">
                    @csrf
                    <div class="form-group">
                        <label for="password" class="col-md-4 col-form-label">Mot de passe actuel:</label>
                        <div class="col">
                            <input id="password" type="password" class="form-control" name="current_password"
                                   autocomplete="current-password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Nouveau mot de passe:</label>

                        <div class="col-md-12 w-40">
                            <input id="new_password" type="password" class="form-control" name="new_password"
                                   autocomplete="current-password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Confirmer le mot de passe:</label>

                        <div class="col-md-12">
                            <input id="new_confirm_password" type="password" class="form-control"
                                   name="new_confirm_password" autocomplete="current-password">
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <div class="col-md-12 md-4">
                            <button type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary mt-3 mb-3">
                                Valider les changements
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-6 w-50 mt-4 pt-2">
                <h4 class="text-center">Modifier mes informations</h4>
                <form method="POST" action="{{ route('infoUpdate') }}">
                    @csrf
                    <div class="form-group row w-50 border-bottom border-1" style="border-color: #dee2e6">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Mail:</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext"
                                   id="staticEmail" value={{(Auth::user()->email)}}>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-4 col-form-label">Nouvelle adresse mail:</label>

                        <div class="col">
                            <input id="email" type="email" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-md-4 col-form-label">Adresse:</label>

                        <div class="col">
                            <input id="address" type="text" class="form-control" name="address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city" class="col-md-4 col-form-label">Ville:</label>

                        <div class="col">
                            <input id="city" type="text" class="form-control" name="city">
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <div class="col-md-12 md-4">
                            <button type="submit" class="btn btn-primary mt-3 mb-3">
                                Valider les changements
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<div class="mb-5 pb-2">

</div>
@endsection
