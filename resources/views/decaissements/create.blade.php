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
                    <h3>Les décaissement du montant</h3>
                </div>
                <div class="card-block">
                 @if(!empty($decaissements))
                <div class="row">
                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                <thead>
                                <tr>
                                   <th>#</th>
                                    <th>Libelle</th>
                                    <th>Montant depensé</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($decaissements as $decaissement)
                                        <tr>
                                            <td>{{ $decaissement->id }}</td>
                                            <td>{{ $decaissement->montant_decaisse }}</td>
                                            <td>{{ $decaissement->date_decaissement }}</td>
                                        </tr> 
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><br><br>
                    @endif
                    <form method="POST" action="{{ route('decaissement_store') }}">
                        @csrf
                    
                    <input type="text"  name="bailleur_id" value="{{ $bailleur->bailleur_id }}" class="form-control" hidden placeholder="">

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
