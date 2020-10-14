@extends('layouts.adminty')

@section('css')

<!-- Font Icon -->
<link rel="stylesheet" href="{{ asset('bower_components/wizard/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('bower_components/wizard/css/style.css') }}">
@endsection

@section('content')

<div class="page-body">
    <div class="row">

        <div class="col-sm-12">

            <!-- Form wizard with validation card start -->
            <div class="card">
                <div class="card-header"  style="text-align: center;">
                    <h3>Ajout d'une nouvelle activité</h3>
                </div>
                <div class="card-block">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h3>
                            <span class="title_text">Information sur l'activité </span>
                        </h3>
                        <fieldset>
                            <div class="fieldset-content">
                                <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="row form-group">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label"> </label>
                                                </div>
                                                <div class="col-sm-9 input-group">
                                                    <span class="input-group-addon" id="basic-addon1"></span>
                                                    <input type="text" class="form-control" title="Veuillez entrer le nom de l'activité" placeholder="Veuillez entrer le nom de l'activité">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label"> </label>
                                                </div>
                                                <div class="col-sm-9 input-group">
                                                    <span class="input-group-addon" id="basic-addon1"></span>
                                                    <select class="form-control" id="" name="" title="Veuillez choisir le responsable de l'activité">
                                                        <option selected="selected">Veuillez choisir le responsable</option>
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label"> </label>
                                                </div>
                                                <div class="col-sm-9 input-group">
                                                    <span class="input-group-addon" id="basic-addon1"></span>
                                                    <input type="date" class="form-control" title="Veuillez entrer la date début de l'activité" placeholder="Veuillez entrer la date début de l'activité">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label"> </label>
                                                </div>
                                                <div class="col-sm-9 input-group">
                                                    <span class="input-group-addon" id="basic-addon1"></span>
                                                    <input type="date" class="form-control" title="Veuillez entrer la date fin de l'activité" placeholder="Veuillez entrer la date fin de l'activité">
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
                                                    <label class="col-form-label"> </label>
                                                </div>
                                                <div class="col-sm-9 input-group">
                                                    <span class="input-group-addon" id="basic-addon1"></span>
                                                    <select class="form-control" id="" name="" title="Veuillez choisir le demandeur de l'activité">
                                                        <option selected="selected">Veuillez choisir le demandeur</option>
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label"> </label>
                                                </div>
                                                <div class="col-sm-9 input-group">
                                                    <span class="input-group-addon" id="basic-addon1"></span>
                                                    <input type="file" class="form-control" title="Veuillez joindre un fichier JPG, PNG, PDF" placeholder="Veuillez joindre un fichier JPG, PNG, PDF">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label"> </label>
                                                </div>
                                                <div class="col-sm-9 input-group">
                                                    <span class="input-group-addon" id="basic-addon1"></span>
                                                    <textarea name="" id="" class="form-control" rows="2" title="Veuillez faire un commentaire sur l'activité" placeholder="Veuillez faire un commentaire sur l'activité"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>

                            </div>
                            <div class="fieldset-footer">
                                <span> Etape 1 sur 3</span>
                            </div>
                        </fieldset>

                        <h3>
                            <span class="title_text">Lignes de l'activité </span>
                        </h3>
                        <fieldset>

                            <div class="fieldset-content">
                                <div class="row">
                                    <div class="col-sm-12" style="position :relative; left:50px;">
                                        <a href="#" class="btn btn-success">
                                            <i class="feather icon-plus"></i> </a>
                                        <table id="example-2" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Ligne d'activité </th>
                                                    <th>Montant prévu</th>
                                                    <th>Montant depensé</th>
                                                    <th style="text-align: center"><a href="#" class="btn btn-success" id="addLigne"><i class="feather icon-plus"></i></a></th>
                                                </tr>
                                            </thead>
                                            <tbody id="ligne">
                                                <tr>
                                                    <td>
                                                        <div class="">
                                                            <div class="form-group form-primary">
                                                                <div class="input-group">
                                                                    <select class="form-control" id="" name="avantage_id[]">
                                                                        <option selected="selected">********Sélectionnez********</option>
                                                                        <option value=""></option>
                                                                    </select>
                                                                 </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="">
                                                            <div class="form-group form-primary">
                                                                <div class="input-group">
                                                                    <input type="text" name="montant[]" title="" value="" id="" class="form-control" placeholder="Veillez entrer le montant prévu">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="">
                                                            <div class="form-group form-primary">
                                                                <div class="input-group">
                                                                    <input type="text" name="montant[]" title="" value="" id="" class="form-control" placeholder="Veillez entrer le montant depensé">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td style="text-align: center"><a href="#" class="btn btn-danger remove"><i class="feather icon-minus"></i></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="fieldset-footer">
                                <span> Etape 2 sur 3</span>
                            </div>

                        </fieldset>

                        <h3>
                            <span class="title_text">Bailleurs de l'activité </span>
                        </h3>
                        <fieldset>
                            <div class="fieldset-content">
                                <div class="row">
                                    <div class="col-sm-12" style="position :relative; left:50px;">
                                        <table id="example-2" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Ligne d'activité </th>
                                                    <th>Montant prévu</th>
                                                    <th>Montant depensé</th>
                                                    <th style="text-align: center"><a href="#" class="btn btn-success" id="addLigne1"><i class="feather icon-plus"></i></a></th>
                                                </tr>
                                            </thead>
                                            <tbody id="ligne1">
                                                <tr>
                                                    <td>
                                                        <div class="">
                                                            <div class="form-group form-primary">
                                                                <div class="input-group">
                                                                    <select class="form-control" id="" name="avantage_id[]">
                                                                        <option selected="selected">********Sélectionnez********</option>
                                                                        <option value=""></option>
                                                                    </select>
                                                                 </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="">
                                                            <div class="form-group form-primary">
                                                                <div class="input-group">
                                                                    <input type="text" name="montant[]" title="" value="" id="" class="form-control" placeholder="Veillez entrer le montant prévu">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="">
                                                            <div class="form-group form-primary">
                                                                <div class="input-group">
                                                                    <input type="text" name="montant[]" title="" value="" id="" class="form-control" placeholder="Veillez entrer le montant depensé">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td style="text-align: center"><a href="#" class="btn btn-danger remove1"><i class="feather icon-minus"></i></i></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="fieldset-footer">
                                <span> Etape 3 sur 3</span>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
            <!-- Form wizard with validation card end -->
        </div>

    </div>
</div>

@endsection

@section('js')

<!--Forms - Wizard js-->
<script src="{{ asset('bower_components/wizard/vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('bower_components/wizard/vendor/jquery-validation/dist/additional-methods.min.js') }}"></script>
<script src="{{ asset('bower_components/wizard/vendor/jquery-steps/jquery.steps.min.js') }}"></script>*
<script src="{{ asset('bower_components/wizard/js/main.js') }}"></script>
<script src="{{ asset('bower_components/wizard/vendor/minimalist-picker/dobpicker.js') }}"></script>
<script src="{{ asset('bower_components/wizard/vendor/jquery.pwstrength/jquery.pwstrength.js') }}"></script>

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
                            <select class="multisteps-form__select form-control"  id="" name="avantage_id[]">
                                <option selected="selected">***Sélectionnez***</option>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                </div>
            </td>

            <td>
                <div class="">
                    <div class="form-group form-primary">
                        <div class="input-group">
                            <input type="text" name="montant[]" title="" value="" id="" class="form-control" placeholder="Veillez entrer le montant prévu">
                        </div>
                    </div>
                </div>
            </td>

            <td>
                <div class="">
                    <div class="form-group form-primary">
                        <div class="input-group">
                            <input type="text" name="montant[]" title="" value="" id="" class="form-control" placeholder="Veillez entrer le montant depensé">
                        </div>
                    </div>
                </div>
            </td>

            <td style="text-align: center"><a href="#" class="btn btn-danger remove"><i class="feather icon-minus"></i></a></td>
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
                            <select class="multisteps-form__select form-control"  id="" name="avantage_id[]">
                                <option selected="selected">***Sélectionnez***</option>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                </div>
            </td>

            <td>
                <div class="">
                    <div class="form-group form-primary">
                        <div class="input-group">
                            <input type="text" name="montant[]" title="" value="" id="" class="form-control" placeholder="Veillez entrer le montant annoncé">
                        </div>
                    </div>
                </div>
            </td>

            <td>
                <div class="">
                    <div class="form-group form-primary">
                        <div class="input-group">
                            <input type="text" name="montant[]" title="" value="" id="" class="form-control" placeholder="Veillez entrer le montant decaissé">
                        </div>
                    </div>
                </div>
            </td>

            <td style="text-align: center"><a href="#" class="btn btn-danger remove1"><i class="feather icon-minus"></i></td>
            </tr>`;
        $('#ligne1').append(tr);
    };
    $('#ligne1').on('click', '.remove1', function () {
        $(this).parent().parent().remove();
    })


</script>


@endsection
