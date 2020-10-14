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
                    <a href="{{ route('ligne_activites.create') }}" class="btn btn-success">
                        <i class="feather icon-plus"></i> Ajouter</a>
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>Numero</th>
                                <th>Nom ligne</th>
                                <th>Nom responsable</th>
                                <th>Mail responsable</th>
                                <th>Contact responsable</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($ligne_activites as $ligne_activite)
                                <tr>
                                <td>{{ $ligne_activite->id }} </td>
                                <td>{{ $ligne_activite->nom_ligne_activite }}</td>
                                <td>{{ $ligne_activite->nom_responsable_ligne }}</td>
                                <td>{{ $ligne_activite->mail_responsable_ligne }}</td>
                                <td>{{ $ligne_activite->contact_responsable_ligne }}</td>
                                <td>
                                    <a href="{{ route('ligne_activites.edit', $ligne_activite) }}" class="btn btn-primary">
                                        <i class="feather icon-edit"></i>
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
