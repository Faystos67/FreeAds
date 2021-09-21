@extends('layouts.mainlayout')
@section('content')
    <h2 class="text-center" style="color: #ff6e14">Mes annonces</h2>


    <div class="container mb-3 pb-">
        <div class="row mt-5">
            @foreach($annonces as $annonce)
                <div class="col-sm-3 mt-3">
                    <div class="card bg-dark">
                        <h5 class="card-title text-center text-white">{{$annonce->title}}</h5>
                        <img src='{{ $annonce->first_image }}' class="img-fluid">
                        <div class="card-body pt-0 px-0">
                            <div class="d-flex flex-row justify-content-between mb-0 px-3"><small
                                    class="text-muted mt-1"></small>
                                <p class="text-white" style="font-weight: bold">{{$annonce->price}} &euro;
                                </p>
                            </div>
                            <div class="card-body" style="border-top: 1px solid grey">
                                <p class="card-text text-white">{{$annonce->description}}</p>
                            </div>
                            <hr class="mt-2 mx-3">
                            <div class="mx-3 mt-3 mb-2 text-center">

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger mt-2 delete-ad" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal"
                                        data-attr="{{ route('mydAverts', $annonce->id) }}">
                                    Supprimer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div id="deleteModal" class="modal fade" tabindex="-1">
        <form id="post-delete" method="post" action="">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Etes-vous sûr de vouloir supprimer cette annonce ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-danger">Confirmer</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
