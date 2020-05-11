@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Formulaire d'enregistrement des rendez-vous</div>
                <div class="card-body">
                    @if(isset($confirmation))
                        @if($confirmation == 1)
                            <div class="alert alert-success">Rendez-vous ajouté</div>
                        @else
                            <div class="alert alert-danger">Rendez-vous non ajouté</div>
                        @endif
                    @endif
                    <form method="POST" action="{{ route('persistrendezvous') }}">
                    @csrf
                        <div class="form-group">
                                <label class="control-label" for="libelle">Libellé du rendez-vous</label>
                                <input class="form-control" type="text" name="libelle" id="libelle">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="nom">Date du rendez-vous</label>
                                <input class="form-control" type="date" name="date" id="date">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="medecins_id">Choisissez un medecin</label>
                                <select class="form-control" name="medecin" id="medecin">
                                    <option value="0">Faites un choix</option>
                                    @foreach($medecins as $medecin)
                                        <option value="{{ $medecin->id }}">{{ $medecin->prenom }} {{ $medecin->nom }} </option>
                                    @endforeach                                   
                                </select>
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
