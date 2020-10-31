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
                    <h3>Liste des directions</h3>
                </div>
                <div class="card-block">
                    <a href="" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                        <i class="feather icon-plus"></i> Nouveau</a><br><br>
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Direction</th>
                                <th>Afficher les departements</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($directions as $direction)
                                <tr>
                                    <td>{{ $direction->id }} </td>
                                    <td>{{ $direction->libelle_direction }}</td>
                                    <td>
                                        <a href="{{ route('directions.show', $direction->id) }}" class="btn btn-info">
                                            <i class="feather icon-eye"></i>
                                        </a>
                                    </td>
                                    <td>
                                       <a href=""
                                            id="l{{ $direction->id }}" data-toggle="modal" data-target="#exampleModal1"
                                            data-route="{{ route('directions.update', $direction->id) }}"
                                            data-libelle_direction="{{ $direction->libelle_direction}}"
                                            onclick="update('#l{{ $direction->id }}')"
                                            class="btn btn-primary"><i class="feather icon-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('plan_actions.destroy', $direction->id) }}" id="form{{ $direction->id }}">

                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="button" onclick="confirmation('#form{{ $direction->id }}')" class="btn btn-danger" >
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



 <!-- Ajout direction Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nouvelle direction</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('directions.store') }}" method="POST">
                @csrf
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label class="col-form-label">Direction :</label>
                        </div>
                        <div class="col-sm-9 input-group">
                            <span class="input-group-addon" id="basic-addon7"></span>
                            <input type="text" name="libelle_direction" class="form-control" placeholder="Veuillez entrer le nom de la direction">
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

             <!-- Modifcation direction Modal -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modification d'une direction</h5>
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
                            <label class="col-form-label">Direction :</label>
                        </div>
                        <div class="col-sm-9 input-group">
                            <span class="input-group-addon" id="basic-addon7"></span>
                            <input type="text" name="libelle_direction" id="libelle_direction" class="form-control" placeholder="Veuillez entrer le nom de la direction">
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
        function update(directionId) {
                $('#libelle_direction').val($(directionId).attr('data-libelle_direction'))
                $('#form2').attr('action', $(directionId).attr('data-route'))
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
