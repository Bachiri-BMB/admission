@extends('Dashboard.layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('title')
   اضافة مريض جديد
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">المرضي</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة مريض جديد</span>
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
                <form action="{{ route('Patients.store') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            <label>Numero Assuré</label>
                            <input type="text" name="Numero_Assure" value="{{ old('Numero_Assure') }}" class="form-control @error('Numero_Assure') is-invalid @enderror" required>
                        </div>
                        <div class="col">
                            <label>Nom Assuré</label>
                            <input type="text" name="Nom_Assure" value="{{ old('Nom_Assure') }}" class="form-control @error('Nom_Assure') is-invalid @enderror" required>
                        </div>
                        <div class="col">
                            <label>Prenom Assuré</label>
                            <input type="text" name="Prenom_Assure" value="{{ old('Prenom_Assure') }}" class="form-control @error('Prenom_Assure') is-invalid @enderror" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-3">
                            <label>Date Naissance Assuré</label>
                            <input class="form-control fc-datepicker" name="Date_Naiss_Assure" placeholder="YYYY-MM-DD" type="text" required>
                        </div>
                        <div class="col">
                            <label>Lieu Naissance</label>
                            <input type="text" name="Lieu_Naissance" value="{{ old('Lieu_Naissance') }}" class="form-control @error('Lieu_Naissance') is-invalid @enderror">
                        </div>
                        <div class="col">
                            <label>Sexe Assuré</label>
                            <select class="form-control" name="Sexe_Assure" required>
                                <option value="" selected>-- Sélectionnez --</option>
                                <option value="Masculin">Masculin</option>
                                <option value="Féminin">Féminin</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-3">
                            <label>Civilite</label>
                            <input type="text" name="Civilite" value="{{ old('Civilite') }}" class="form-control @error('Civilite') is-invalid @enderror">
                        </div>
                        <div class="col">
                            <label>Grade</label>
                            <input type="text" name="Grade" value="{{ old('Grade') }}" class="form-control @error('Grade') is-invalid @enderror" required>
                        </div>
                        <div class="col">
                            <label>Matricule</label>
                            <input type="text" name="Matricule" value="{{ old('Matricule') }}" class="form-control @error('Matricule') is-invalid @enderror">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label>Adresse</label>
                            <textarea rows="5" cols="10" class="form-control" name="Adresse">{{ old('Adresse') }}</textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label>Telephone</label>
                            <input type="text" name="Telephone" value="{{ old('Telephone') }}" class="form-control @error('Telephone') is-invalid @enderror" required>
                        </div>
                        <div class="col">
                            <label>Service</label>
                            <input type="text" name="Service" value="{{ old('Service') }}" class="form-control @error('Service') is-invalid @enderror">
                        </div>
                        <div class="col">
                            <label>MGSN</label>
                            <input type="text" name="MGSN" value="{{ old('MGSN') }}" class="form-control @error('MGSN') is-invalid @enderror">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label>Groupe Sanguin</label>
                            <input type="text" name="Blood_Group" value="{{ old('Blood_Group') }}" class="form-control @error('Blood_Group') is-invalid @enderror">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-success">Enregistrer les données</button>
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
