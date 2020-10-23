@extends('layouts.adminty')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- Date card start -->
            <div class="card">
                <div class="card-header"  style="text-align: center;">
                    <h3>Modification d'un plan d'action</h3>
                </div>
                <div class="card-block">
                    <form method="POST" action="{{ route('plan_actions.update', $plan_action->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Intitule Plan Action : </label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon7"></span>
                                                <input type="text" name="nom_plan_action" value="{{ $plan_action->nom_plan_action }}" class="form-control" placeholder="Veuillez entrer le nom du plan d'action">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Observations :</label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon7"></span>
                                                <textarea name="commentaire" id="" class="form-control" value="" rows="1" placeholder="Veuillez faire une observation sur le plan d'action">{{ $plan_action->commentaire }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <h5 style="text-align: center;">Les projets de mise en oeuvre</h5><br>
                                <table id="example-2" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>Projet </th>
                                            <th>Responsable</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th style="text-align: center"><a href="#" class="btn btn-success" id="addLigne"><i class="feather icon-plus"></i></a></th>
                                        </tr>
                                    </thead>
                                    <tbody id="ligne">
                                    @foreach($plan_action->projetMiseEnOeuvres as $projetMiseEnOeuvre)
                                        <tr>
                                            <td>
                                                <div class="">
                                                    <div class="form-group form-primary">
                                                        <div class="input-group">
                                                            <input type="text" name="nom_projet[]" value="{{ $projetMiseEnOeuvre->nom_projet }}" id="" class="form-control" placeholder="Veillez entrer le nom du projet">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <div class="form-group form-primary">
                                                        <div class="input-group">
                                                            <input type="text" name="nom_responsable_projet[]" value="{{ $projetMiseEnOeuvre->nom_responsable_projet }}" id="" class="form-control" placeholder="Veillez entrer le nom du responsable">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <div class="form-group form-primary">
                                                        <div class="input-group">
                                                            <input type="text" name="email_responsable_projet[]" value="{{ $projetMiseEnOeuvre->email_responsable_projet }}" id="" class="form-control" placeholder="Veillez entrer l'adresse mail du responsable">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <div class="form-group form-primary">
                                                        <div class="input-group">
                                                            <input type="text" name="contact_responsable_projet[]" value="{{ $projetMiseEnOeuvre->contact_responsable_projet }}" id="" class="form-control" placeholder="Veillez entrer le contact du responsable">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="text-align: center">
                                                <button class="btn btn-danger remove"><i class="feather icon-minus"></i></button>
                                            </td>
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
                                     {{ ('Annuler') }}
                               </a>
                                <button type="submit" class="btn btn-primary">
                                     {{ ('Enregistrer') }}
                                </button>
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
                    </form>
                </div>
            </div>
            <!-- Date card end -->
        </div>
    </div>
</div>
@endsection

@section('js')

<script>

    $('#addLigne').on('click', function (f) {
      f.preventDefault()
        addLigne();
    });
    function addLigne() {
        var tr = `<tr>
                    <td>
                        <div class="">
                            <div class="form-group form-primary">
                                <div class="input-group">
                                    <input type="text" name="nom_projet[]" value="" id="" class="form-control" placeholder="Veillez entrer le nom du projet">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="">
                            <div class="form-group form-primary">
                                <div class="input-group">
                                    <input type="text" name="nom_responsable_projet[]" value="" id="" class="form-control" placeholder="Veillez entrer le nom du responsable">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="">
                            <div class="form-group form-primary">
                                <div class="input-group">
                                    <input type="text" name="email_responsable_projet[]" value="" id="" class="form-control" placeholder="Veillez entrer l'adresse mail du responsable">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="">
                            <div class="form-group form-primary">
                                <div class="input-group">
                                    <input type="text" name="contact_responsable_projet[]" value="" id="" class="form-control" placeholder="Veillez entrer le contact du responsable">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td style="text-align: center">
                        <button class="btn btn-danger remove"><i class="feather icon-minus"></i></button>
                    </td>
                </tr>`;
        $('#ligne').append(tr);
    };
    $('#ligne').on('click', '.remove', function () {
        $(this).parent().parent().remove();
    })


</script>

@endsection
