@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Formulaire d'enregistrement des medecins</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('persistmedecin') }}">
                    @csrf
                        <div class="form-group">
                                <label class="control-label" for="nom">Nom du medecin</label>
                                <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom" id="nom">
                                    @error('nom')
                                        <div class="invalid-feedback">
                                            {{ $errors->first('nom')}}
                                        </div>
                                    @enderror  
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="nom">Prenom  du medecin</label>
                                <input class="form-control @error('prenom') is-invalid @enderror" type="text" name="prenom" id="prenom">
                                    @error('prenom')
                                        <div class="invalid-feedback">
                                            {{ $errors->first('prenom')}}
                                        </div>
                                    @enderror  
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="telephone">Téléphone du Medecin</label>
                                <input class="form-control @error('telephone') is-invalid @enderror" type="tel" name="telephone" id="telephone">
                                    @error('telephone')
                                        <div class="invalid-feedback">
                                            {{ $errors->first('telephone')}}
                                        </div>
                                    @enderror 
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
