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
                    <h3>Liste des plans d'action</h3>
                </div>
                <div class="card-block">
                    <a href="{{ route('plan_actions.create') }}" class="btn btn-success">
                        <i class="feather icon-plus"></i> Nouveau</a><br><br>
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Plan action</th>
                                <th>Observations</th>
                                <th>Detail</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($plan_actions as $plan_action)
                                <tr>
                                <td>{{ $plan_action->id }} </td>
                                <td>{{ $plan_action->nom_plan_action }}</td>
                                <td>{{ $plan_action->commentaire }}</td>
                                <td>
                                    <a href="{{ route('plan_actions.show', $plan_action) }}" class="btn btn-info">
                                        <i class="feather icon-eye"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('plan_actions.edit', $plan_action) }}" class="btn btn-primary">
                                        <i class="feather icon-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('plan_actions.destroy', $plan_action->id) }}" id="form{{ $plan_action->id }}">

                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="button" onclick="confirmation('#form{{ $plan_action->id }}')" class="btn btn-danger" >
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
