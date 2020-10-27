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
                    <h3>Les justifications de dépense</h3>
                </div>
                <div class="card-block">
                     <div class="row">
                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                <thead>
                                <tr>
                                   <th>#</th>
                                    <th>Libelle</th>
                                    <th>Montant depensé</th>
                                    <th>Document </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($justifications as $justification)
                                        <tr>
                                            <td>{{ $justification->id }}</td>
                                            <td>{{ $justification->libelle }}</td>
                                            <td>{{ $justification->montant_depense }}</td>
                                            <td>
                                               <a href="{{ asset($justification->piece_jointe) }}" class="btn btn-link">Visualiser</a>
                                           </td>
                                        </tr> 
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row form-group">
                                        <div class="col-sm-3">
                                            <label class="col-form-label">Montant prevu : </label>
                                        </div>
                                        <div class="col-sm-9 input-group">
                                            <span class="input-group-addon" id="basic-addon7"></span>
                                            <input type="text"  name="" class="form-control" value="{{ $ligne_activite->montant_ligne_activite }}" disabled placeholder="Veuillez entrer le nom de l'activité">
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
                                            <label class="col-form-label">Total montant depensé  :</label>
                                        </div>
                                        <div class="col-sm-9 input-group">
                                            <span class="input-group-addon" id="basic-addon7"></span>
                                            <input type="text" name="" class="form-control" value="{{ $montant_depense }}" placeholder="Veuillez entrer la date fin de l'activité" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('justification_store') }}" enctype="multipart/form-data">
                        @csrf

                    <input type="text"  name="ligne_activite_id" value="{{ $ligne_activite->id }}" class="form-control" hidden placeholder="">

                    <div class="row">
                        <div class="dt-responsive table-responsive">
                            <table id="example-2" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Libellé </th>
                                        <th>Montant depensé</th>
                                        <th>Piece jointe</th>
                                        <th style="text-align: center"><a href="#" class="btn btn-success" id="addLigne1"><i class="feather icon-plus"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody id="ligne1">
                                    <tr>
                                        <td>
                                            <div class="">
                                                <div class="form-group form-primary">
                                                    <div class="input-group">
                                                        <input type="text" name="libelle[]" value="" id="" class="form-control" placeholder="Veillez entrer le libellé">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="">
                                                <div class="form-group form-primary">
                                                    <div class="input-group">
                                                        <input type="text" name="montant_depense[]" value="" id="" class="form-control" placeholder="Veillez entrer le montant depensé">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="">
                                                <div class="form-group form-primary">
                                                    <div class="input-group">
                                                        <input type="file" name="piece_jointe[]" value="" id="" class="form-control" placeholder="Veillez entrer la piéce jointe">
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
                            <input type="text" name="libelle[]" value="" id="" class="form-control" placeholder="Veillez entrer le libellé">
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <div class="">
                    <div class="form-group form-primary">
                        <div class="input-group">
                            <input type="text" name="montant_depense[]" value="" id="" class="form-control" placeholder="Veillez entrer le montant depensé">
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <div class="">
                    <div class="form-group form-primary">
                        <div class="input-group">
                            <input type="file" name="piece_jointe[]" value="" id="" class="form-control" placeholder="Veillez entrer la piéce jointe">
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
