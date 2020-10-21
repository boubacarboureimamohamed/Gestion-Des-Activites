@extends('layouts.adminty')

@section('css')

@endsection

@section('content')

<div class="page-body">
    <div class="row">

        <div class="col-sm-12">

            <!-- Form wizard with validation card start -->
            <div class="card">
                <div class="card-header"  style="text-align: center;">
                    <h3>Modificaion de l'activité</h3>
                </div>
                <div class="card-block">
                    <form method="POST" action="{{ route('activites.update', $activite) }}"   enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Libellé Activité : </label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon1"></span>
                                                <input type="text" name="nom_activite" value="{{ $activite->nom_activite }}" class="form-control" placeholder="Veuillez entrer le libellé de l'activité">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Responsable :</label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon1"></span>
                                                <select class="form-control" id="" name="responsable_activite_id" value="{{ $activite->responsableActivite->nom_responsable_activite }}">
                                                    <option value="">********Sélectionnez********</option>
                                                    @foreach ($responsable_activites as $responsable_activite)
                                                      <option @if ($responsable_activite->id == $activite->responsable_activite_id) {{ 'selected' }} @endif value="{{ $responsable_activite->id }}">{{ $responsable_activite->nom_responsable_activite }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Date début :</label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon1"></span>
                                                <input type="date" name="date_debut_activite" value="{{ $activite->date_debut_activite }}" class="form-control" placeholder="Veuillez entrer la date début de l'activité">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Observation :</label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon1"></span>
                                                <textarea name="commentaire_activite" id="" value="{{ $activite->commentaire_activite }}" class="form-control" rows="1" placeholder="Veuillez faire une observation sur l'activité"></textarea>
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
                                                <label class="col-form-label">Demandeur :</label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon1"></span>
                                                <select class="form-control" id="" name="demandeur_id" value="{{ $activite->demandeur->nom_demandeur }}">
                                                      <option selected="selected">********Sélectionnez********</option>
                                                    @foreach ($demandeurs as $demandeur)
                                                      <option @if ($demandeur->id == $activite->demandeur_id) {{ 'selected' }} @endif value="{{ $demandeur->id }}">{{ $demandeur->nom_demandeur }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Budget :</label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon1"></span>
                                                <input type="text" name="" value="" class="form-control" placeholder="Veuillez entrer le budget de l'activité">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Date fin :</label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon1"></span>
                                                <input type="date" name="date_fin_activite" value="{{ $activite->date_fin_activite }}" class="form-control" placeholder="Veuillez entrer la date fin de l'activité">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Piéce jointe :</label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon1"></span>
                                                <input type="file" name="piece_jointe" class="form-control" value="{{ $activite->piece_jointe }}" placeholder="Veuillez joindre un fichier JPG, PNG, PDF">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <h5 style="text-align: center;">Les lignes de l'activité</h5><br>
                                <a href="" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                    <i class="feather icon-plus"></i> Nouvelle Ligne</a>
                                <table id="example-2" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>Ligne Activité </th>
                                            <th>Montant prévu</th>
                                            <th>Responsable</th>
                                            <th>Mail</th>
                                            <th>Contact</th>
                                            <th style="text-align: center"><a href="#" class="btn btn-success" id="addLigne"><i class="feather icon-plus"></i></a></th>
                                        </tr>
                                    </thead>
                                    <tbody id="ligne">
                                            @foreach ($activite->ligneActivites as $ligne_actvte)
                                        <tr>
                                            <td>
                                                <div class="">
                                                    <div class="form-group form-primary">
                                                        <div class="input-group">
                                                            <select class="form-control" id="" name="ligne_activite_id[]">
                                                                @foreach ($ligne_activites as $ligne_activite)
                                                                 <option value="{{ $ligne_activite->id }}" @if ($ligne_activite->id == $activite->ligne_activite_id ) {{ 'selected' }} @endif>{{ $ligne_activite->nom_ligne_activite }}</option>
                                                                 @endforeach
                                                            </select>
                                                         </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <div class="form-group form-primary">
                                                        <div class="input-group">
                                                            <input type="text" name="montant_prevu[]" value="{{ $ligne_actvte->pivot->montant_prevu }}" id="" class="form-control" placeholder="Veillez entrer le montant prévu">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <div class="form-group form-primary">
                                                        <div class="input-group">
                                                            <input type="text" name="nom_responsable[]" value="{{ $ligne_actvte->pivot->nom_responsable }}" id="" class="form-control" placeholder="Veillez entrer le nom et prénom du responsable">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <div class="form-group form-primary">
                                                        <div class="input-group">
                                                            <input type="text" name="mail_responsable[]" value="{{ $ligne_actvte->pivot->mail_responsable }}" id="" class="form-control" placeholder="Veillez entrer l'adresse mail du responsable'">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <div class="form-group form-primary">
                                                        <div class="input-group">
                                                            <input type="text" name="contact_responsable[]" value="{{ $ligne_actvte->pivot->contact_responsable }}" id="" class="form-control" placeholder="Veillez entrer le contact du responsable">
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


                        <div class="row">
                            <div class="col-sm-12">
                                <h5 style="text-align: center;">Les sources de financement</h5><br>
                                <a href="" class="btn btn-success" data-toggle="modal" data-target="#exampleModal1">
                                    <i class="feather icon-plus"></i> Nouveau Projet</a>
                                <table id="example-2" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>Projet </th>
                                            <th>Montant annoncé</th>
                                            <th style="text-align: center"><a href="#" class="btn btn-success" id="addLigne1"><i class="feather icon-plus"></i></a></th>
                                        </tr>
                                    </thead>
                                    <tbody id="ligne1">
                                        @foreach($activite->bailleurs as $bail)
                                        <tr>
                                            <td>
                                                <div class="">
                                                    <div class="form-group form-primary">
                                                        <div class="input-group">
                                                            <select class="form-control" id="" name="bailleur_id[]">
                                                                @foreach ($bailleurs as $bailleur)
                                                                    <option @if ($bailleur->id == $activite->bailleur_id ) {{ 'selected' }} @endif value="{{ $bailleur->id }}">{{ $bailleur->nom_bailleur }}</option>
                                                                @endforeach
                                                            </select>
                                                         </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <div class="form-group form-primary">
                                                        <div class="input-group">
                                                            <input type="text" name="montant_annonce[]" value="{{ $bail->pivot->montant_annonce }}" id="" class="form-control" placeholder="Veillez entrer le montant annoncé">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="text-align: center">
                                                <button class="btn btn-danger remove1"><i class="feather icon-minus"></i></button>
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
                               <a href="{{ route('activites.index') }}" class="btn btn-default">
                                     {{ ('Annuler') }}
                               </a>
                                <button type="submit" class="btn btn-primary">
                                     {{ ('Modifier') }}
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
            <!-- Form wizard with validation card end -->
        </div>

    </div>
</div>

<!-- Ajout demandeur Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajout d'une nouvelle ligne activité</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="" method="POST">
            @csrf
                <div class="row form-group">
                    <div class="col-sm-3">
                        <label class="col-form-label">Nom ligne activité :</label>
                    </div>
                    <div class="col-sm-9 input-group">
                        <span class="input-group-addon" id="basic-addon7"></span>
                        <input type="text" name="nom_ligne_activite" class="form-control" placeholder="Veuillez entrer l'intitulé de la ligne d'activité">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-3">
                        <label class="col-form-label">Nom responsable :</label>
                    </div>
                    <div class="col-sm-9 input-group">
                        <span class="input-group-addon" id="basic-addon7"></span>
                        <input type="text" name="nom_responsable_ligne" class="form-control" placeholder="Veuillez entrer le nom du responsable">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-3">
                        <label class="col-form-label">Contact responsable :</label>
                    </div>
                    <div class="col-sm-9 input-group">
                        <span class="input-group-addon" id="basic-addon7"></span>
                        <input type="text" name="contact_responsable_ligne" class="form-control" placeholder="Veuillez entrer le contact du responsable">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-3">
                        <label class="col-form-label">Email responsable :</label>
                    </div>
                    <div class="col-sm-9 input-group">
                        <span class="input-group-addon" id="basic-addon7"></span>
                        <input type="text" name="mail_responsable_ligne" class="form-control" placeholder="Veuillez entrer l'adresse mail du responsable">
                    </div>
                </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
        </form>
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
                            <select class="form-control" id="" name="ligne_activite_id[]">
                                <option selected="selected">********Sélectionnez********</option>
                                 @foreach ($ligne_activites as $ligne_activite)
                                    <option value="{{ $ligne_activite->id }}">{{ $ligne_activite->nom_ligne_activite }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </td>

            <td>
                <div class="">
                    <div class="form-group form-primary">
                        <div class="input-group">
                            <input type="text" name="montant_prevu[]" value="" id="" class="form-control" placeholder="Veillez entrer le montant prévu">
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <div class="">
                    <div class="form-group form-primary">
                        <div class="input-group">
                            <input type="text" name="nom_responsable[]" value="" id="" class="form-control" placeholder="nom responsable">
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <div class="">
                    <div class="form-group form-primary">
                        <div class="input-group">
                            <input type="text" name="mail_responsable[]" value="" id="" class="form-control" placeholder="Mail responsable">
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <div class="">
                    <div class="form-group form-primary">
                        <div class="input-group">
                            <input type="text" name="contact_responsable[]" value="" id="" class="form-control" placeholder="Contact responsable">
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
                            <select class="form-control" id="" name="bailleur_id[]">
                                <option selected="selected">********Sélectionnez********</option>
                                 @foreach ($bailleurs as $bailleur)
                                    <option value="{{ $bailleur->id }}">{{ $bailleur->nom_bailleur }}</option>
                                 @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </td>

            <td>
                <div class="">
                    <div class="form-group form-primary">
                        <div class="input-group">
                            <input type="text" name="montant_annonce[]" value="" id="" class="form-control" placeholder="Veillez entrer le montant annoncé">
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
