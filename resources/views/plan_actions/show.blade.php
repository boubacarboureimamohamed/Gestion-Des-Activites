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
                    <h3>Les agences d'execution <strong>{{ $plan_action->nom_plan_action }}</strong></h3>
                </div>
                <div class="card-block">

                    <div class="row">
                        <div class="dt-responsive table-responsive">
                            <table id="example-2" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th># </th>
                                            <th>Agence </th>
                                            <th>Responsable</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($plan_action->projetMiseEnOeuvres as $projetMiseEnOeuvre)
                                            <tr>
                                                <td>{{ $projetMiseEnOeuvre->id }} </td>
                                                <td>{{ $projetMiseEnOeuvre->nom_projet }}</td>
                                                <td>{{ $projetMiseEnOeuvre->nom_responsable_projet }}</td>
                                                <td>{{ $projetMiseEnOeuvre->email_responsable_projet }}</td>
                                                <td>{{ $projetMiseEnOeuvre->contact_responsable_projet }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>

                    <div class="row m-t-20">
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-10" style="text-align: center;">
                            <a href="{{ route('plan_actions.index') }}" class="btn btn-default">
                                    {{ ('Retour') }}
                            </a>
                        </div>
                        <div class="col-md-1">

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-11">
                            <p class="text-inverse text-left m-b-0">Develop By </p>
                            <p class="text-inverse text-left"><a href="#"><b class="f-w-600"> SYNETCOM </b></a></p>
                        </div>
                        <div class="col-md-1">
                            <img src="{{ asset('assets/images/auth/Logo-small-bottom.png') }}" alt="small-logo.png">
                        </div>
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
