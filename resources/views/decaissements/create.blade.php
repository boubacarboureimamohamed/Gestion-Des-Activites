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
                    <h3>Information sur l'activite <strong>{{ $activite->nom_activite }}</strong></h3>
                </div>
                <div class="card-block">
                    <form method="POST" action="{{ route('decaissement_store') }}">
                        @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row form-group">
                                        <div class="col-sm-3">
                                            <label class="col-form-label">Libellé Activité : </label>
                                        </div>
                                        <div class="col-sm-9 input-group">
                                            <span class="input-group-addon" id="basic-addon7"></span>
                                            <input type="text"  name="" value="{{ $activite->nom_activite }}" class="form-control" disabled placeholder="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-3">
                                            <label class="col-form-label">Date début :</label>
                                        </div>
                                        <div class="col-sm-9 input-group">
                                            <span class="input-group-addon" id="basic-addon7"></span>
                                            <input type="text" name="" value="{{ $activite->date_debut_activite }}" class="form-control" placeholder="" disabled>
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
                                            <label class="col-form-label">Responsable Activité :</label>
                                        </div>
                                        <div class="col-sm-9 input-group">
                                            <span class="input-group-addon" id="basic-addon7"></span>
                                            <input type="text" name="" value="{{ $activite->responsableActivite->nom_responsable_activite.' '.$activite->responsableActivite->prenom_responsable_activite  }}" class="form-control" placeholder="" disabled>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-3">
                                            <label class="col-form-label">Date fin :</label>
                                        </div>
                                        <div class="col-sm-9 input-group">
                                            <span class="input-group-addon" id="basic-addon7"></span>
                                            <input type="text" name="" value="{{ $activite->date_fin_activite }}" class="form-control" placeholder="" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="text"  name="bailleur_id" value="{{ $bailleur->id }}" class="form-control" hidden placeholder="">
                    <h5 style="text-align: center;">Information de <strong>{{ $bailleur->nom_bailleur }}</strong></h5><br><br>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row form-group">
                                        <div class="col-sm-3">
                                            <label class="col-form-label">Libellé Projet : </label>
                                        </div>
                                        <div class="col-sm-9 input-group">
                                            <span class="input-group-addon" id="basic-addon7"></span>
                                            <input type="text"  name="" value="{{ $bailleur->nom_bailleur }}" class="form-control" disabled placeholder="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-3">
                                            <label class="col-form-label">Adresse mail :</label>
                                        </div>
                                        <div class="col-sm-9 input-group">
                                            <span class="input-group-addon" id="basic-addon7"></span>
                                            <input type="text" name="" value="{{ $bailleur->mail_bailleur }}" class="form-control" placeholder="" disabled>
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
                                            <label class="col-form-label">Adresse :</label>
                                        </div>
                                        <div class="col-sm-9 input-group">
                                            <span class="input-group-addon" id="basic-addon7"></span>
                                            <input type="text" name="" value="{{ $bailleur->adresse_bailleur }}" class="form-control" placeholder="" disabled>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-3">
                                            <label class="col-form-label">Contact :</label>
                                        </div>
                                        <div class="col-sm-9 input-group">
                                            <span class="input-group-addon" id="basic-addon7"></span>
                                            <input type="text" name="" value="{{ $bailleur->contact_bailleur }}" class="form-control" placeholder="" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h5 style="text-align: center;">Les décaissement du montant annoncé</h5><br><br>
                    <div class="row">
                        <div class="dt-responsive table-responsive">
                            <table id="example-2" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Montant decaisse</th>
                                        <th>Date decaissement</th>
                                        <th style="text-align: center"><a href="#" class="btn btn-success" id="addLigne1"><i class="feather icon-plus"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody id="ligne1">
                                    <tr>
                                        <td>
                                            <div class="">
                                                <div class="form-group form-primary">
                                                    <div class="input-group">
                                                        <input type="text" name="montant_decaisse[]" value="" id="" class="form-control" placeholder="Veillez entrer le montant annoncé">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="">
                                                <div class="form-group form-primary">
                                                    <div class="input-group">
                                                        <input type="date" name="date_decaissement[]" value="" id="" class="form-control" placeholder="Veillez entrer le montant annoncé">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="text-align: center">
                                            <button class="btn btn-danger remove1"><i class="feather icon-minus"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row m-t-20">
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-10" style="text-align: center;">
                            <a href="{{ route('activites.index') }}" class="btn btn-default">
                                    {{ ('Retour') }}
                            </a>
                            <button type="Submit" class="btn btn-primary waves-effect waves-light m-r-20">Enregister</button>
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
            <!-- Zero config.table end -->

        </div>

    </div>
</div>

@endsection

@section('js')
<script>

    $('#addLigne1').on('click', function (f) {
      f.preventDefault()
        addLigne1();
    });
    function addLigne1() {
        var tr = `<tr>

             <td>
                <div class="">
                    <div class="form-group form-primary">
                        <div class="input-group">
                            <input type="text" name="montant_decaisse[]" value="" id="" class="form-control" placeholder="Veillez entrer le montant annoncé">
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <div class="">
                    <div class="form-group form-primary">
                        <div class="input-group">
                            <input type="date" name="date_decaissement[]" value="" id="" class="form-control" placeholder="Veillez entrer le montant annoncé">
                        </div>
                    </div>
                </div>
            </td>

            <td style="text-align: center">
                <button class="btn btn-danger remove1"><i class="feather icon-minus"></i></button>
            </td>

            </tr>`;
        $('#ligne1').append(tr);
    };
    $('#ligne1').on('click', '.remove1', function () {
        $(this).parent().parent().remove();
    })


</script>
@endsection
