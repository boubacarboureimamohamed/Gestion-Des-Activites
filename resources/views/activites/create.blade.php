@extends('layouts.adminty')

@section('css')

  <!-- Multi Select css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/multiselect/css/multi-select.css') }}">
    <!-- Select 2 css -->
    <link rel="stylesheet" href="{{ asset('bower_components/select2/css/select2.min.css') }}">

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
                                                <label class="col-form-label">Plan d'action :</label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon1"></span>
                                                <select class="form-control" id="select" name="plan_action_id" onchange="change()">
                                                      <option id="" selected="selected">********Sélectionnez********</option>
                                                    @foreach ($plan_actions as $plan_action)
                                                        <option value="{{ $plan_action->id }}" data-pa="{{ $plan_action->nom_plan_action }}">{{ $plan_action->nom_plan_action }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
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
                                                <label class="col-form-label">Projet mise en oeuvre :</label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon1"></span>
                                                <select class="form-control"  id="select1" name="projet_mise_en_oeuvre_id">
                                                     
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
                                <h5 style="text-align: center;">Les partenaires techniques et financiers</h5><br>
                                <a href="" class="btn btn-success" data-toggle="modal" data-target="#exampleModal1">
                                    <i class="feather icon-plus"></i> Nouveau Partenaire</a>
                                <table id="example-2" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>Partenaire </th>
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
                                                            <select  class="form-control bailleur_id" id="bailleur_id" name="bailleur_id[]">
                                                                
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

                        <div class="row">
                            <div class="col-sm-12">
                                <h5 style="text-align: center;">Les lignes de l'activité</h5><br>
                                {{-- <a href="" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                    <i class="feather icon-plus"></i> Nouvelle Ligne</a> --}}
                                <table id="example-2" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>Ligne Activité </th>
                                            <th>Quantite</th>
                                            <th>Montant</th>
                                            <th>Beneficiaire(s)</th>
                                            <th>Partenaire</th>
                                            <th style="text-align: center"><a href="#" class="btn btn-success" id="addLigne"><i class="feather icon-plus"></i></a></th>
                                        </tr>
                                    </thead>
                                    <tbody id="ligne">
                                        <tr>
                                            <td>
                                                <div class="">
                                                    <div class="form-group form-primary">
                                                        <div class="input-group">
                                                            <input type="text" name="nom_ligne_activite[]" value="" id="" class="form-control" placeholder="Veillez entrer l'intitule de la ligne d'activite">
                                                         </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <div class="form-group form-primary">
                                                        <div class="input-group">
                                                            <input type="text" name="quantite_ligne_activite[]" value="" id="" class="form-control" placeholder="Veillez entrer la quantite">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <div class="form-group form-primary">
                                                        <div class="input-group">
                                                            <input type="text" name="montant_ligne_activite[]" value="" id="" class="form-control" placeholder="Veillez entrer le montant prévu">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <div class="form-group form-primary">
                                                        <div class="input-group">
                                                            <select  class="col-sm-12 multi" multiple="multiple" tabindex="-1" name="beneficiaire_id[0][]" aria-hidden="true">
                                                                @foreach ($beneficiaires as $beneficiaire)
                                                                    <option value="{{ $beneficiaire->id }}">{{ $beneficiaire->nom_beneficiaire }}</option>
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
                                                            <select class="form-control partenaireS" onclick="PartenairesSelectionner()" id="" name="bailleur_ligne_activite[]">
                                                                 
                                                            </select>
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

$(function(){
    $('.multi').multiselect();
})

    function change()
    {
        let pa = $('#select option:selected').attr('data-pa')
        let plan_action_id = $('#select option:selected').val()

        $("#select1").empty();

        axios.get('/getProjet?plan_action_id='+plan_action_id)
            .then(function(response) {

                console.log(response)
                
                response.data.projet_mises_en_oeuvres.forEach(element => {
                    $('#select1').append(

                        `<option value="${ element.id }">${element.nom_projet}</option>`

                    )
                })

            })
    }

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

    var index = 1;

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
                            <input type="text" name="nom_ligne_activite[]" value="" id="" class="form-control" placeholder="Veillez entrer l'intitule de la ligne d'activite">
                            </div>
                    </div>
                </div>
            </td>
            <td>
                <div class="">
                    <div class="form-group form-primary">
                        <div class="input-group">
                            <input type="text" name="quantite_ligne_activite[]" value="" id="" class="form-control" placeholder="Veillez entrer la quantite">
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <div class="">
                    <div class="form-group form-primary">
                        <div class="input-group">
                            <input type="text" name="montant_ligne_activite[]" value="" id="" class="form-control" placeholder="Veillez entrer le montant prévu">
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <div class="">
                    <div class="form-group form-primary">
                        <div class="input-group">
                            <select  class="multi col-sm-12" multiple="multiple" name="beneficiaire_id[${index}][]" tabindex="-1" aria-hidden="true">
                                @foreach ($beneficiaires as $beneficiaire)
                                    <option value="{{ $beneficiaire->id }}">{{ $beneficiaire->nom_beneficiaire }}</option>
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
                            <select class="form-control partenaireS" id="" onclick="PartenairesSelectionner()" name="bailleur_ligne_activite[]">
                                    
                            </select>
                        </div>
                    </div>
                </div>
            </td>
            <td style="text-align: center">
                <button class="btn btn-danger remove"><i class="feather icon-minus"></i></button>
            </td>

            </tr>`;
        $('#ligne').append(tr);
        index++;
        PartenairesSelectionner();

    $('.multi').multiselect();
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
                            <select class="form-control bailleur_id" id="bailleur_id" name="bailleur_id[]">
                                
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
        getPartenaires()
    };
    $('#ligne1').on('click', '.remove1', function () {
        $(this).parent().parent().remove();
    })


</script>

<script>
 $(document).ready(function(){
     getPartenaires()

 });

var partenaires = []
 function getPartenaires()
 {
      axios.get('/getData')
    .then(function(response){
        $(".bailleur_id").each(function(){
            let oldValue = this.value
             $(this).empty();
           let self = this
           partenaires =  response.data.bailleurs
           response.data.bailleurs.forEach(element => {

            $(self).append(
                `<option value="${ element.id }">${element.nom_bailleur}</option>`
                
            )
            this.value = oldValue
        });
         });
        
    })
    .catch(function(error){
             
             
      });
 }

 function PartenairesSelectionner()
 {
         var selectedPartners = $(".bailleur_id").map(function() {
        return this.value;
        }).get(); 
        console.log(selectedPartners) 
        $(".partenaireS").each(function(){
            let oldValue = this.value
            $(this).empty();
           let self = this
           selectedPartners.forEach(element => {

            $(self).append(
                `<option value="${element}">${element ? partenaires.find((item)=>item.id == element).nom_bailleur : ''}</option>`
            )
            this.value = oldValue
        });
       
         });
       
 }


</script>


    <!-- Multiselect js -->
    <script type="text/javascript" src="{{ asset('bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/multiselect/js/jquery.multi-select.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.quicksearch.js') }}"></script>
    <!-- Select 2 js -->
<script type="text/javascript" src="{{ asset('bower_components/select2/js/select2.full.min.js') }}"></script>
<!-- Custom js -->
<script type="text/javascript" src="{{ asset('assets/pages/advance-elements/select2-custom.js') }}"></script>

@endsection
