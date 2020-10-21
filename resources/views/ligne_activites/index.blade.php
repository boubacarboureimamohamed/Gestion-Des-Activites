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
                    <h3>Liste des ligne d'activite</h3>
                </div>
                <div class="card-block">
                    <a href="{{ route('ligne_activites.create') }}" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                        <i class="feather icon-plus"></i>Nouvelle Ligne</a><br><br>
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Ligne Activité</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($ligne_activites as $ligne_activite)
                                <tr>
                                <td>{{ $ligne_activite->id }} </td>
                                <td>{{ $ligne_activite->nom_ligne_activite }}</td>
                                <td>
                                    <a href=""
                                         id="l{{ $ligne_activite->id }}" data-toggle="modal" data-target="#exampleModal1"
                                         data-route="{{ route('modifierligneactivite', $ligne_activite->id) }}"
                                         data-nom_ligne_activite="{{ $ligne_activite->nom_ligne_activite}}"
                                         onclick="update('#l{{ $ligne_activite->id }}')"
                                         class="btn btn-primary"><i class="feather icon-edit"></i>
                                     </a>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('ligne_activites.destroy', $ligne_activite->id) }}" id="form{{ $ligne_activite->id }}">

                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="button" onclick="confirmation('#form{{ $ligne_activite->id }}')" class="btn btn-danger" >
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
            <h5 class="modal-title" id="exampleModalLabel">Nouvelle ligne d'activité</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="{{ route('ligne_activites.store') }}" method="POST">
            @csrf
            <div class="row form-group">
                <div class="col-sm-3">
                    <label class="col-form-label">Libellé : </label>
                </div>
                <div class="col-sm-9 input-group">
                    <span class="input-group-addon" id="basic-addon7"></span>
                    <input type="text" name="nom_ligne_activite" class="form-control" placeholder="Veuillez entrer le libellé de la ligne d'activité">
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
            <h5 class="modal-title" id="exampleModalLabel">Modification d'une ligne d'activité </h5>
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
                    <label class="col-form-label">Libellé : </label>
                </div>
                <div class="col-sm-9 input-group">
                    <span class="input-group-addon" id="basic-addon7"></span>
                    <input type="text" name="nom_ligne_activite" id="nom_ligne_activite" class="form-control" placeholder="Veuillez entrer le libellé de la ligne d'activité">
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
    function update(ligne_activite_id) {
            $('#nom_ligne_activite').val($(ligne_activite_id).attr('data-nom_ligne_activite'))
            $('#form2').attr('action', $(ligne_activite_id).attr('data-route'))
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
