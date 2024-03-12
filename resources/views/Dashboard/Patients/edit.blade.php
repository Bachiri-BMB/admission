@extends('Dashboard.layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('title')
   تعديل بيانات مريض
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">المرضي</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/  تعديل بيانات مريض</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
@include('Dashboard.messages_alert')
<!-- row -->
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('Patients.update', $Patient->id) }}" method="post" autocomplete="on">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            <label>Nom de l'assuré</label>
                            <input type="text" name="Nom_Assure"  value="{{ $Patient->Nom_Assure }}" class="form-control @error('Nom_Assure') is-invalid @enderror " required>
                        </div>
                        <input type="hidden" name="id" value="{{$Patient->id}}">

                        <div class="col">
                            <label>Prénom de l'assuré</label>
                            <input type="text" name="Prenom_Assure"  value="{{ $Patient->Prenom_Assure }}" class="form-control @error('Prenom_Assure') is-invalid @enderror" required>
                        </div>


                        <div class="col">
                            <label>Date de naissance de l'assuré</label>
                            <input class="form-control fc-datepicker" value="{{ $Patient->Date_Naiss_Assure }}" name="Date_Naiss_Assure" type="text" required>
                        </div>

                        <div class="col">
                            <label>Lieu de naissance de l'assuré</label>
                            <input class="form-control fc-datepicker" value="{{ $Patient->Lieu_Naissance }}" name="Lieu_Naissance" type="text" required>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-3">
                            <label>Numéro d'assuré</label>
                            <input type="text" name="Numero_Assure"  value="{{ $Patient->Numero_Assure }}" class="form-control @error('Numero_Assure') is-invalid @enderror" required>
                        </div>

                        <div class="col">
                            <label>Sexe de l'assuré</label>
                            <select class="form-control" name="Sexe_Assure" required>
                                <option value="Masculin" {{ $Patient->Sexe_Assure == 'Masculin' ? 'selected' : '' }}>Masculin</option>
                                <option value="Féminin" {{ $Patient->Sexe_Assure == 'Féminin' ? 'selected' : '' }}>Féminin</option>
                            </select>
                        </div>

                        <div class="col">
                            <label>Civilité de l'assuré</label>
                            <input type="text" name="Civilite"  value="{{ $Patient->Civilite }}" class="form-control @error('Civilite') is-invalid @enderror" required>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-3">
                            <label>Matricule de l'assuré</label>
                            <input type="text" name="Matricule"  value="{{ $Patient->Matricule }}" class="form-control @error('Matricule') is-invalid @enderror" required>
                        </div>

                        <div class="col">
                            <label>Téléphone de l'assuré</label>
                            <input type="text" name="Telephone"  value="{{ $Patient->Telephone }}" class="form-control @error('Telephone') is-invalid @enderror" required>
                        </div>
                        <div class="col">
                            <label>Service de l'assuré</label>
                            <input type="text" name="Service"  value="{{ $Patient->Service }}" class="form-control @error('Service') is-invalid @enderror" required>
                        </div>
                        <div class="col">
                            <label>Grade</label>
                            <input type="text" name="Grade"  value="{{ $Patient->Grade }}" class="form-control @error('Service') is-invalid @enderror" required>
                        </div>
                        <div class="col">
                            <label>MGSN</label>
                            <input type="text" name="MGSN"  value="{{ $Patient->MGSN }}" class="form-control @error('Service') is-invalid @enderror" required>
                        </div>
                        <div class="col">
                            <label>Groupage</label>
                            <input type="text" name="Blood_Group"  value="{{ $Patient->Blood_Group }}" class="form-control @error('Service') is-invalid @enderror" required>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col">
                            <label>Adresse de l'assuré</label>
                            <textarea rows="5" cols="10" class="form-control" name="Adresse">{{ $Patient->Adresse }}</textarea>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <button class="btn btn-success">Enregistrer les modifications</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('dashboard/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    </script>
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
