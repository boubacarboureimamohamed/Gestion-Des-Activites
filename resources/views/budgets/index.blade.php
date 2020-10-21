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
                    <h3>Liste des budgets</h3>
                </div>
                <div class="card-block">
                    <a href="{{ route('budgets.create') }}" class="btn btn-success">
                        <i class="feather icon-plus"></i> Ajouter</a><br><br>
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Activité</th>
                                <th>Budget</th>
                                <th>Date</th>
                                <th>Observations</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($budgets as $budget)
                                <tr>
                                <td>{{ $budget->id }} </td>
                                <td>{{ $budget->nom_activite }}</td>
                                <td>{{ $budget->montant_budget }}</td>
                                <td>{{ $budget->date_budget }}</td>
                                <td>{{ $budget->commentaire_budget }}</td>
                                <td>
                                    <a href="{{ route('budgets.edit', $budget) }}" class="btn btn-primary">
                                        <i class="feather icon-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('budgets.destroy', $budget->id) }}" id="form{{ $budget->id }}">

                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="button" onclick="confirmation('#form{{ $budget->id }}')" class="btn btn-danger" >
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
