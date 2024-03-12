@extends('Dashboard.layouts.master')
@section('css')
    <link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet"/>
    <!-- Add your additional CSS links here -->
@endsection

@section('page-header')
    <!-- Breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">تفاصيل المريض</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ $patient->name }}</span>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->
@endsection

@section('content')
    @include('Dashboard.messages_alert')

    <div class="row">
        <!-- Informations du Patient -->
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Informations du Patient</h5>
                    <ul class="list-unstyled">
                        <li><strong>Numéro d'Assuré:</strong> {{ $patient->Numero_Assure }}</li>
                        <li><strong>Nom:</strong> {{ $patient->Nom_Assure }}</li>
                        <li><strong>Prénom:</strong> {{ $patient->Prenom_Assure }}</li>
                        <li><strong>Date de Naissance:</strong> {{ $patient->Date_Naiss_Assure }}</li>
                        <li><strong>Lieu de Naissance:</strong> {{ $patient->Lieu_Naissance }}</li>
                        <li><strong>Sexe:</strong> {{ $patient->Sexe_Assure }}</li>
                        <li><strong>Civilité:</strong> {{ $patient->Civilite }}</li>
                        <li><strong>Grade:</strong> {{ $patient->Grade }}</li>
                        <li><strong>Matricule:</strong> {{ $patient->Matricule }}</li>
                        <li><strong>Adresse:</strong> {{ $patient->Adresse }}</li>
                        <li><strong>Téléphone:</strong> {{ $patient->Telephone }}</li>
                        <li><strong>Service:</strong> {{ $patient->Service }}</li>
                        <li><strong>MGSN:</strong> {{ $patient->MGSN }}</li>
                        <li><strong>Groupe Sanguin:</strong> {{ $patient->Blood_Group }}</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Section avec un design moderne à côté -->
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <!-- Add an ID to the button -->
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addBeneficiaryModal">
                        <i class="fas fa-plus"></i> Ajouter Ayant_droit
                    </a>
                    @if($beneficiaries && count($beneficiaries) > 0)
                    <h2>Liste des Ayant Droits</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Date de Naissance</th>
                                <th>Sexe</th>
                                <th>Lien de Parenté</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($beneficiaries as $beneficiary)
                                <tr>
                                    <td>{{ $beneficiary->Nom }}</td>
                                    <td>{{ $beneficiary->Prénom }}</td>
                                    <td>{{ $beneficiary->Date_naissance }}</td>
                                    <td>{{ $beneficiary->Sexe }}</td>
                                    <td>{{ $beneficiary->Lien_parenté }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Aucun ayant droit associé à ce patient.</p>
                @endif

                </div>



            </div>
        </div>



        <div class="modal fade" id="addBeneficiaryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter un Ayant droit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('patients.store_beneficiary', $patient->id) }}" method="post" autocomplete="off">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="N_SS_malade">N°SS</label>
                                <input type="text" name="N_SS_malade" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="Nom">Nom</label>
                                <input type="text" name="Nom" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="Prénom">Prénom</label>
                                <input type="text" name="Prénom" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="Date_naissance">Date de naissance</label>
                                <input type="date" name="Date_naissance" class="form-control" required>
                            </div>
                            <div class="col">
                                <label>Sexe </label>
                                <select class="form-control" name="Sexe" required>
                                    <option value="" selected>-- Sélectionnez --</option>
                                    <option value="Masculin">Masculin</option>
                                    <option value="Féminin">Féminin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Lien_parenté">Lien de parenté</label>
                                <select name="Lien_parenté" class="form-control" required>
                                    <option value="Ascendant">Ascendant</option>
                                    <option value="Descendant">Descendant</option>
                                    <option value="Conjoint">Conjoint</option>
                                    <option value="Enfant">Enfant</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



@endsection

@section('js')
    <!-- Internal Notify js -->
    <script src="{{ URL::asset('dashboard/plugins/notify/js/notifIt.js') }}"></script>

    <script src="{{ URL::asset('/plugins/notify/js/notifit-custom.js') }}"></script>
    <script>
        // Wait for the document to be fully loaded
        document.addEventListener('DOMContentLoaded', function () {
            // Find the button element
            var addBeneficiaryBtn = document.getElementById('addBeneficiaryBtn');
            // Find the modal element
            var addBeneficiaryModal = document.getElementById('addBeneficiaryModal');

            // Add a click event listener to the button
            addBeneficiaryBtn.addEventListener('click', function () {
                // Display the modal by adding the 'show' class to its class list
                addBeneficiaryModal.classList.add('show');
                // Add the 'modal-open' class to the body to enable scrolling
                document.body.classList.add('modal-open');
            });

        });
    </script>

    <!-- Add your additional JS scripts here -->
@endsection
