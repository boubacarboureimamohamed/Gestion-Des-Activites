@extends('layouts.adminty')

@section('css')

@endsection

@section('content')

<div class="page-body">
    <div class="row">

        <div class="col-sm-12">

            <!-- Zero config.table start -->
            <div class="card">
                <div class="card-header"  style="text-align: center;">
                    <h3>Liste des departements</h3>
                </div>
                <div class="card-block">
                    <a href="" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                        <i class="feather icon-plus"></i> Nouveau</a><br><br>
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Departement</th>
                                <th>Direction</th>
                                <th>Afficher les districts</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($departements as $departement)
                                <tr>
                                <td>{{ $departement->id }} </td>
                                <td>{{ $departement->libelle_departement }}</td>
                                <td>{{ $departement->direction->libelle_direction }}</td>
                                <td>
                                    <a href="{{ route('departements.show', $departement->id) }}" class="btn btn-info">
                                        <i class="feather icon-eye"></i>
                                    </a>
                                    </td>
                                <td>
                                    <a href="{{ route('plan_actions.edit', $departement) }}" class="btn btn-primary">
                                        <i class="feather icon-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('plan_actions.destroy', $departement->id) }}" id="form{{ $departement->id }}">

                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="button" onclick="confirmation('#form{{ $departement->id }}')" class="btn btn-danger" >
                                            <i class="feather icon-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Zero config.table end -->

        </div>

    </div>
</div>


 <!-- Ajout departement Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nouveau departement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('departements.store') }}" method="POST">
                @csrf
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label class="col-form-label">Departement :</label>
                        </div>
                        <div class="col-sm-9 input-group">
                            <span class="input-group-addon" id="basic-addon7"></span>
                            <input type="text" name="libelle_departement" class="form-control" placeholder="Veuillez entrer le nom de departement">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label class="col-form-label">Direction :</label>
                        </div>
                        <div class="col-sm-9 input-group">
                            <span class="input-group-addon" id="basic-addon1"></span>
                            <select class="form-control" id="select" name="direction_id">
                                    <option id="" selected="selected">********Sélectionnez********</option>
                                @foreach ($directions as $direction)
                                    <option value="{{ $direction->id }}">{{ $direction->libelle_direction }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
            </form>
            </div>
        </div>
        </div>

@endsection

@section('js')

<script>

     function confirmation(target)
        {
            swal({
                title: "Êtes-vous sûr ???",
                text: "Une fois supprimé, vous ne pourrez plus récupérer cet enregistrement! ",
                type: "warning",
                showCancelButton: true,
                confirmButtonText:'Oui',
                cancelButtonText:'Non'

            }).then(function() {
                $(target).submit();
            });
        }

    </script>

@endsection
