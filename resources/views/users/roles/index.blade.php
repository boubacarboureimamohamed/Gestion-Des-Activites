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
                    <h3>Liste des rôles</h3>
                </div>
                <div class="card-block">
                    <a href="{{ route('roles.create') }}" class="btn btn-success">
                        <i class="feather icon-plus"></i> </a>
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>Role</th>
                                <th>Permission(s)</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                <tr>
                                <td> {{ $role->name}} </td>
                                <td>
                                    @foreach ($role->permissions as $permission)
                                        <span class="badge badge-primary badge-pill">
                                            {{  $permission->name }}
                                        </span>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('roles.edit', $role) }}" class="btn btn-primary">
                                        <i class="feather icon-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('roles.destroy', $role) }}" id="form{{ $role->id }}">

                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="button" onclick="confirmation('#form{{ $role->id }}')" class="btn btn-danger" >
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
