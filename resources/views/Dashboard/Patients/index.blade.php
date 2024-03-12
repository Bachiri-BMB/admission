@extends('Dashboard.layouts.master')
@section('css')
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">المرضي</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة المرضي</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.messages_alert')
				<!-- row opened -->
				<div class="row row-sm">
					<!--div-->
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
                                    <a href="{{route('Patients.create')}}" class="btn btn-primary">اضافة مريض جديد</a>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>N° Assure</th>
                                                <th>Nom de l'assuré</th>
                                                <th>Prénom de l'assuré</th>
                                                <th>Date de naissance</th>
                                                <th>Lieu de naissance</th>
                                                <th>Sexe</th>
                                                <th>Civilité</th>
                                                <th>Grade</th>
                                                <th>Matricule</th>
                                                <th>Adresse</th>
                                                <th>Téléphone</th>
                                                <th>Service</th>
                                                <th>MGSN</th>
                                                <th>Groupe sanguin</th>
                                                <th>Opérations</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($Patients as $Patient)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$Patient->Numero_Assure }}</td>
                                                <td>{{$Patient->Nom_Assure}}</td>
                                                <td>{{$Patient->Prenom_Assure}}</td>
                                                <td>{{$Patient->Date_Naiss_Assure}}</td>
                                                <td>{{$Patient->Lieu_Naissance}}</td>
                                                <td>{{$Patient->Sexe_Assure}}</td>
                                                <td>{{$Patient->Civilite}}</td>
                                                <td>{{$Patient->Grade}}</td>
                                                <td>{{$Patient->Matricule}}</td>
                                                <td>{{$Patient->Adresse}}</td>
                                                <td>{{$Patient->Telephone}}</td>
                                                <td>{{$Patient->Service}}</td>
                                                <td>{{$Patient->MGSN}}</td>
                                                <td>{{$Patient->Blood_Group}}</td>
                                                <td>
                                                    <a href="{{ route('Patients.edit', $Patient->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i> Modifier</a>
                                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#Deleted{{$Patient->id}}"><i class="fas fa-trash"></i> Supprimer</button>

                                                    <a href="{{ route('Patients.show', $Patient->id) }}" class="btn btn-sm btn-success"><i class="fas fa-eye"></i> Détails </a>


                                                </td>
                                            </tr>
                                            @include('Dashboard.Patients.Deleted')
                                            @endforeach
                                        </tbody>
                                    </table>

								</div>
							</div><!-- bd -->
						</div><!-- bd -->
					</div>
					<!--/div-->
				</div>
				<!-- /row -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Notify js -->
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
