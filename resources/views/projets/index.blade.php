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
                    <h3>Liste des projets</h3>
                </div>
                <div class="card-block">
                    <a href="{{ route('projets.create') }}" class="btn btn-success">
                        <i class="feather icon-plus"></i> Nouveau</a><br><br>
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Projet</th>
                                <th>Responsable</th>
                                <th>Adresse mail</th>
                                <th>Contact</th>
                                <th>Plan action</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($projets as $projet)
                                <tr>
                                <td> {{ $projet->id }} </td>
                                <td> {{ $projet->nom_projet}} </td>
                                <td> {{ $projet->nom_responsable_projet }}</td>
                                <td> {{ $projet->email_responsable_projet }}</td>
                                <td> {{ $projet->contact_responsable_projet }}</td>
                                <td> {{ $projet->planAction->nom_plan_action }}</td>
                                <td>
                                    <a href="{{ route('projets.edit', $projet) }}" class="btn btn-primary">
                                        <i class="feather icon-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('bailleurs.destroy', $projet) }}" id="form{{ $projet->id }}">

                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="button" onclick="confirmation('#form{{ $projet->id }}')" class="btn btn-danger" >
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
