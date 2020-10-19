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
                    <h3>Liste des demandeurs</h3>
                </div>
                <div class="card-block">
                    <a href="{{ route('demandeurs.create') }}" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                        <i class="feather icon-plus"></i>Nouveau</a>
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Demandeur</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                                    @foreach ($demandeurs as $demandeur)
                                <tr>
                                    <td>{{ $demandeur->id }} </td>
                                    <td>{{ $demandeur->nom_demandeur }}</td>
                                    <td>
                                       <a href=""
                                            id="l{{ $demandeur->id }}" data-toggle="modal" data-target="#exampleModal1"
                                            data-route="{{ route('modifierdemandeur', $demandeur->id) }}"
                                            data-nom_demandeur="{{ $demandeur->nom_demandeur}}"
                                            onclick="update('#l{{ $demandeur->id }}')"
                                            class="btn btn-primary"><i class="feather icon-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('demandeurs.destroy', $demandeur->id) }}" id="form{{ $demandeur->id }}">

                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="button" onclick="confirmation('#form{{ $demandeur->id }}')" class="btn btn-danger" >
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
        <!-- Ajout demandeur Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nouveau demandeur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('demandeurs.store') }}" method="POST">
                @csrf
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label class="col-form-label">Libellé Demandeur</label>
                        </div>
                        <div class="col-sm-9 input-group">
                            <span class="input-group-addon" id="basic-addon7"></span>
                            <input type="text" name="nom_demandeur" class="form-control" placeholder="Veuillez entrer le libellé du demandeur">
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

             <!-- Modifcation demandeur Modal -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modification d'un demandeur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="form2" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label class="col-form-label">Libellé Demandeur :</label>
                        </div>
                        <div class="col-sm-9 input-group">
                            <span class="input-group-addon" id="basic-addon7"></span>
                            <input type="text" name="nom_demandeur" id="nom_demandeur" class="form-control" placeholder="Veuillez entrer le libellé du demandeur">
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
            </form>
            </div>
        </div>
        </div>

@endsection

@section('js')
<script>
        function update(demandeurId) {
                $('#nom_demandeur').val($(demandeurId).attr('data-nom_demandeur'))
                $('#form2').attr('action', $(demandeurId).attr('data-route'))
        }
    </script>

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
