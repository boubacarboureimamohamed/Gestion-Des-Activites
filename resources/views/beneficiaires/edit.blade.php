@extends('layouts.adminty')

@section('css')

@endsection

@section('content')

<div class="page-body">
    <div class="row">

        <div class="col-sm-12">

            <!-- Form wizard with validation card start -->
            <br><br><br><br><br><br>
            <h5>Creation d'un demandeur</h5><br><br>
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="wizard">
                                <section>
                                    <form action="{{ route('demandeurs.update', $demandeur) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <div class="col-md-4 col-lg-2">
                                                    <label for="userName-2" class="block">Nom *</label>
                                                </div>
                                                <div class="col-md-8 col-lg-10">
                                                    <input id="userName-2" value="{{ $demandeur->nom_demandeur }}" name="nom_demandeur" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <a href="{{ route('demandeurs.index') }}" id="edit-cancel" class="btn btn-default waves-effect">Annuler</a>
                                                <button type="Submit" class="btn btn-primary waves-effect waves-light m-r-20">Modifier</button>
                                            </div>
                                    </form>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form wizard with validation card end -->
        </div>

    </div>
</div>

@endsection

@section('js')

@endsection
