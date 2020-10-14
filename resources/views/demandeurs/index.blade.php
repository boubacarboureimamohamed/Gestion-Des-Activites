@extends('layouts.adminty')

@section('css')

@endsection

@section('content')

<div class="page-body">
    <div class="row">

        <div class="col-sm-12">

            <!-- Zero config.table start -->
            <div class="card">
                <div class="card-header">
                    <h5>Liste des demandeurs</h5>
                </div>
                <div class="card-block">
                <a href="{{ route('demandeurs.create') }}" class="btn btn-success"  style="float: none;margin: 5px;">
                <i class="feather icon-plus"></i> {{ (' Nouveau') }}
                    </a>
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>Numero</th>
                                <th>Nom de demandeur d'activite</th>
                                <th>Modifier</th>
                                <th>Spprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($demandeurs as $demandeur)
                                <tr>
                                    <td>{{ $demandeur->id }}</td>
                                    <td>{{ $demandeur->nom_demandeur }}</td>
                                    <td>
                                       <a href="{{ route('demandeurs.edit', $demandeur) }}" class="btn btn-warning">
                                         <i class="feather icon-edit"></i>
                                       </a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('demandeurs.destroy', $demandeur) }}" id="form{{ $demandeur->id }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="button" onclick="confirmation('#form{{ $demandeur->id }}')" class="btn btn-danger">
                                            <i class="feather icon-delete"></i>
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
