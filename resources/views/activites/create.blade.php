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
                    <h3>Nouvelle activité</h3>
                </div>
                <div class="card-block">
                    <form method="POST" action="{{ route('activites.store') }}" enctype="multipart/form-data">
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
                                                <span class="input-group-addon" id="basic-addon1"></span>
                                                <input type="text" name="nom_activite" class="form-control" placeholder="Veuillez entrer le libellé de l'activité">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Responsable :</label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon1"></span>
                                                <select class="form-control" id="responsable_activite_id" name="responsable_activite_id">
                                                    <option id="responsable_activite_id" selected="selected">********Sélectionnez********</option>
                                                    @foreach ($responsable_activites as $responsable_activite)
                                                      <option value="{{ $responsable_activite->id }}">{{ $responsable_activite->nom_responsable_activite.' '.$responsable_activite->prenom_responsable_activite  }}</option>
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
                                                <input type="date" name="date_debut_activite" class="form-control" placeholder="Veuillez entrer la date début de l'activité">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Observation :</label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon1"></span>
                                                <textarea name="commentaire_activite" id="" class="form-control" rows="1" placeholder="Veuillez faire une observation sur l'activité"></textarea>
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
                                                <select class="form-control" id="" name="demandeur_id">
                                                      <option id="demandeur_id" selected="selected">********Sélectionnez********</option>
                                                    @foreach ($demandeurs as $demandeur)
                                                      <option value="{{ $demandeur->id }}">{{ $demandeur->nom_demandeur }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Budget:</label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon1"></span>
                                                <input type="text" name="montant_budget" class="form-control" placeholder="Veuillez entrer le budget de l'activité">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Date fin :</label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon1"></span>
                                                <input type="date" name="date_fin_activite" class="form-control" placeholder="Veuillez entrer la date fin de l'activité">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Piéce jointe :</label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon1"></span>
                                                <input type="file" name="piece_jointe" class="form-control" placeholder="Veuillez joindre un fichier JPG, PNG, PDF">
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
                                        <tr>
                                            <td>
                                                <div class="">
                                                    <div class="form-group form-primary">
                                                        <div class="input-group">
                                                            <select class="form-control" id="ligne_activite_id" name="ligne_activite_id[]">
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
                                                            <input type="text" name="nom_responsable[]" value="" id="" class="form-control" placeholder="Veillez entrer le nom et prénom du responsable">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <div class="form-group form-primary">
                                                        <div class="input-group">
                                                            <input type="text" name="mail_responsable[]" value="" id="" class="form-control" placeholder="Veillez entrer l'adresse mail du responsable'">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <div class="form-group form-primary">
                                                        <div class="input-group">
                                                            <input type="text" name="contact_responsable[]" value="" id="" class="form-control" placeholder="Veillez entrer le contact du responsable">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="text-align: center">
                                                <button class="btn btn-danger remove"><i class="feather icon-minus"></i></button>
                                            </td>
                                        </tr>
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
                                        <tr>
                                            <td>
                                                <div class="">
                                                    <div class="form-group form-primary">
                                                        <div class="input-group">
                                                            <select class="form-control" id="bailleur_id" name="bailleur_id[]">
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
            <!-- Form wizard with validation card end -->
        </div>

    </div>
</div>

<!-- Ajout ligne activite Modal -->
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
        <form id="ligne_activite">
            @csrf
                <div class="row form-group">
                    <div class="col-sm-3">
                        <label class="col-form-label">Intitulé :</label>
                    </div>
                    <div class="col-sm-9 input-group">
                        <span class="input-group-addon" id="basic-addon7"></span>
                        <input type="text" name="nom_ligne_activite" class="form-control" placeholder="Veuillez entrer l'intitulé de la ligne d'activité">
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

    <!-- Ajout bailleur Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nouveau bailleur de fond</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form id="bailleur">
            @csrf
                <div class="row form-group">
                    <div class="col-sm-3">
                        <label class="col-form-label">Nom :</label>
                    </div>
                    <div class="col-sm-9 input-group">
                        <span class="input-group-addon" id="basic-addon7"></span>
                         <input type="text" value="{{ old('nom_bailleur') }}" name="nom_bailleur" class="form-control" placeholder="Veuillez entrer le nom du bailleur">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-3">
                        <label class="col-form-label">Adresse :</label>
                    </div>
                    <div class="col-sm-9 input-group">
                        <span class="input-group-addon" id="basic-addon7"></span>
                        <input type="text" name="adresse_bailleur" value="{{ old('adresse_bailleur') }}" class="form-control" placeholder="Veuillez entrer l'adresse du bailleur">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-3">
                        <label class="col-form-label">Contact :</label>
                    </div>
                    <div class="col-sm-9 input-group">
                        <span class="input-group-addon" id="basic-addon7"></span>
                        <input type="text" name="contact_bailleur" value="{{ old('contact_bailleur') }}" class="form-control" placeholder="Veuillez entrer le contact du bailleur">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-3">
                        <label class="col-form-label">Email :</label>
                    </div>
                    <div class="col-sm-9 input-group">
                        <span class="input-group-addon" id="basic-addon7"></span>
                        <input type="email" name="mail_bailleur" value="{{ old('mail_bailleur') }}" class="form-control" placeholder="Veuillez entrer l'adresse mail de bailleur de fond">
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
   $(document).ready(function(){
     $("#responsable_activite_id").on('click',function(e){
         e.preventDefault();
         $("#responsable_activite_id").empty();
    axios.get('/getData')
    .then(function(response){
        response.data.responsable_activites.forEach(element => {
            $('#responsable_activite_id').append(
                `<option value="${element.id}">${element.nom_responsable_activite}</option>`
            )
        });

    })
    .catch(function(error){

    })
     });
});
</script>
<script>
   $(document).ready(function(){
     $("#ligne_activite_id").on('click',function(e){
         e.preventDefault();
         $("#ligne_activite_id").empty();
    axios.get('/getData')
    .then(function(response){
        response.data.ligne_activites.forEach(element => {
            $('#ligne_activite_id').append(
                `<option value="${ element.id }">${element.nom_ligne_activite}</option>`
            )
        });

    })
    .catch(function(error){

    })
     });
});
</script>

<script>
   $(document).ready(function(){
     $("#bailleur_id").on('click',function(e){
         e.preventDefault();
         $("#bailleur_id").empty();
    axios.get('/getData')
    .then(function(response){
        response.data.bailleurs.forEach(element => {
            $('#bailleur_id').append(
                `<option value="${ element.id }">${element.nom_bailleur}</option>`
            )
        });

    })
    .catch(function(error){

    })
     });
});
</script>

<script>
    $(document).ready(function(){
        $("#bailleur").on('submit', function(e){
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '/addBailleur',
                data: $('#bailleur').serialize(),
                success: function(response){
                    console.log(response);
                    $('#exampleModal1').modal('hide');
                    swal({
                    title: "Enregisté !",
                    text: "Opération effectuée!",
                    icon: "success",
                    button: "Ok",
                });

                },
                 error: function(error){
                     let all_errors = '';
                     console.log(error.responseJSON);
                     $('#exampleModal1').modal('hide');
                     Object.keys(error.responseJSON.errors).forEach(function(bailleur){
                          all_errors += '\n'+error.responseJSON.errors[bailleur]
                     });

                 swal({
                title: "Erreur !",
                text: all_errors,
                icon: "error",
                color: "red",
                button: "Ok",
            });       
                    }
            });
        });
    });

</script>
<script>
    $(document).ready(function(){
        $("#ligne_activite").on('submit', function(e){
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '/addLigne_activite',
                data: $('#ligne_activite').serialize(),
                success: function(response){
                    console.log(response);
                    $('#exampleModal').modal('hide');
                    swal({
                    title: "Enregisté !",
                    text: "Opération effectuée!",
                    icon: "success",
                    button: "Ok",
                });

                },
                 error: function(error){
                     let all_errors = '';
                     $('#exampleModal').modal('hide');
                      Object.keys(error.responseJSON.errors).forEach(function(ligne_activite){
                          all_errors += '\n'+error.responseJSON.errors[ligne_activite]
                     });
                 swal({
                title: "Erreur !",
                text: all_errors,
                icon: "error",
                color: "red",
                button: "Ok",
            });  
                    }
            });
        });
    });

</script>
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
                            <input type="text" name="nom_responsable[]" value="" id="" class="form-control" placeholder="Veillez entrer le montant depensé">
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <div class="">
                    <div class="form-group form-primary">
                        <div class="input-group">
                            <input type="text" name="mail_responsable[]" value="" id="" class="form-control" placeholder="Veillez entrer le montant depensé">
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <div class="">
                    <div class="form-group form-primary">
                        <div class="input-group">
                            <input type="text" name="contact_responsable[]" value="" id="" class="form-control" placeholder="Veillez entrer le montant depensé">
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
