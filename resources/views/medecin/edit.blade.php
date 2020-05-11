@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Formulaire de mis à jour des informations des medecins</div>
                <div class="card-body">
                    @if(isset($confirmation))
                        @if($confirmation == 1)
                            <div class="alert alert-success">Mis à jour effectué</div>
                        @else
                            <div class="alert alert-danger">Mis à jour non effectué</div>
                        @endif
                    @endif
                    <form method="POST" action="{{ route('updatemedecin') }}">
                    @csrf
                        <div class="form-group">
                                <label class="control-label" for="id">Identifiant du medecin</label>
                                <input class="form-control" readonly="true" type="text" name="id" id="id" value="{{ $medecin->id }}">
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label" for="nom">Nom du medecin</label>
                                <input class="form-control" type="text" name="nom" id="nom" value="{{ $medecin->nom }}">
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label" for="prenom">Prenom  du medecin</label>
                                <input class="form-control" type="text" name="prenom" id="prenom" value="{{ $medecin->prenom }}">
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="telephone">Téléphone du Medecin</label>
                                <input class="form-control" type="tel" name="telephone" id="telephone" value="{{ $medecin->telephone }}">
                            </div>
                            
                            <div class="form-group">
                                <input class="btn btn-success" type="submit" value="valider">
                                <input class="btn btn-danger" type="reset" value="annuler">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
@endsection
