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
                    <h5>Zero Configuration</h5>
                    <span>DataTables has most features enabled by default, so all you need to do to use it with your own ables is to call the construction function: $().DataTable();.</span>

                </div>
                <a href="{{ route('budgets.create') }}" class="btn btn-success btn-round">Ajouter</a>
                <div class="card-block">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>Montant budget</th>
                                <th>Date budget</th>
                                <th>Commentaire</th>
                                <th>Activite</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($budgets as $budget)
                                <tr>
                                    <td>{{ $budget->montant_budget }}</td>
                                    <td>{{ $budget->date_budget }}</td>
                                    <td>{{ $budget->commentaire_budget }}</td>
                                    <td>{{ $budget->activite->nom_activite }}</td>
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

@endsection
