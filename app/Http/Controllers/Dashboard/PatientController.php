<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientRequest;
use App\Interfaces\Patients\PatientRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\AyantDroit;

class PatientController extends Controller
{

    private $Patient;

    public function __construct(PatientRepositoryInterface $Patient)
    {
        $this->Patient = $Patient;
    }

    public function index()
    {
        return $this->Patient->index();
    }


    public function create()
    {
        return$this->Patient->create();
    }


    public function store(StorePatientRequest $request)
    {
       return $this->Patient->store($request);
    }


    public function show($id)
    {
        return $this->Patient->show($id);
    }


    public function edit($id)
    {
        return $this->Patient->edit($id);
    }


    public function update(StorePatientRequest $request)
    {
        return $this->Patient->update($request);
    }


    public function destroy(Request $request)
    {
       return $this->Patient->destroy($request);
    }

    public function patient_id($id)
    {
        // Find the patient or return a 404 error if not found
        $patient = Patient::findOrFail($id);
        return view('Dashboard.Ayant_droit.add', compact('patient'));
    }

    public function storeBeneficiary(Request $request, $id)
    {
        try {
            // Find the patient
            $patient = Patient::findOrFail($id);

            // Create a new beneficiary
            $beneficiary = new AyantDroit();
            $beneficiary->patient_id  = $patient->id; // Use the patient's ID directly
            $beneficiary->Nom = $request->input('Nom');
            $beneficiary->Prénom = $request->input('Prénom');
            $beneficiary->N_SS_malade = $request->input('N_SS_malade');
            $beneficiary->Date_naissance = $request->input('Date_naissance');
            $beneficiary->Sexe = $request->input('Sexe');
            $beneficiary->Lien_parenté = $request->input('Lien_parenté');

            // Save the beneficiary associated with the patient
            $beneficiary->save();

            // Redirect back to the patient details page with a success message
            return redirect()->route('patients.show', $patient->id)->with('success', 'Ayant droit ajouté avec succès');
        } catch (\Exception $e) {
            // Log or display the exception message for debugging

            // Redirect back with an error message
            return redirect()->back()->with('success', 'Ayant droit ajouté avec succès');
        }
    }


}
