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
                    <h3>Liste des responsable d'activité</h3>
                </div>
                <div class="card-block">
                    <a href="{{ route('responsable_activites.create') }}" class="btn btn-success">
                        <i class="feather icon-plus"></i> Nouveau</a>
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($responsable_activites as $responsable_activite)
                                <tr>
                                <td>{{ $responsable_activite->id }} </td>
                                <td>{{ $responsable_activite->nom_responsable_activite }}</td>
                                <td>{{ $responsable_activite->prenom_responsable_activite }}</td>
                                <td>{{ $responsable_activite->mail_responsable_activite }}</td>
                                <td>{{ $responsable_activite->contact_responsable_activite }}</td>
                                <td>
                                    <a href="{{ route('responsable_activites.edit', $responsable_activite) }}" class="btn btn-primary">
                                        <i class="feather icon-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('responsable_activites.destroy', $responsable_activite->id) }}" id="form{{ $responsable_activite->id }}">

                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="button" onclick="confirmation('#form{{ $responsable_activite->id }}')" class="btn btn-danger" >
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
