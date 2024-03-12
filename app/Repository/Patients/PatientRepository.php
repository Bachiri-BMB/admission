<?php


namespace App\Repository\Patients;
use App\Interfaces\Patients\PatientRepositoryInterface;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Models\AyantDroit;

class PatientRepository implements PatientRepositoryInterface
{
   public function index()
   {
       $Patients = Patient::all();
       return view('Dashboard.Patients.index',compact('Patients'));
   }

   public function create()
   {
       return view('Dashboard.Patients.create');
   }

   public function store($request)
   {
       try {
        $patient = new Patient();
        $patient->Numero_Assure = $request->Numero_Assure;
        $patient->Nom_Assure = $request->Nom_Assure;
        $patient->Prenom_Assure = $request->Prenom_Assure;
        $patient->Date_Naiss_Assure = $request->Date_Naiss_Assure;
        $patient->Lieu_Naissance = $request->Lieu_Naissance;
        $patient->Sexe_Assure = $request->Sexe_Assure;
        $patient->Civilite = $request->Civilite;
        $patient->Grade = $request->Grade;
        $patient->Matricule = $request->Matricule;
        $patient->Adresse = $request->Adresse;
        $patient->Telephone = $request->Telephone;
        $patient->Service = $request->Service;
        $patient->MGSN = $request->MGSN;
        $patient->Blood_Group = $request->Blood_Group;
        $patient->save();
           session()->flash('add');
           return redirect()->back();
       }

       catch (\Exception $e) {
           return redirect()->back()->withErrors(['error' => $e->getMessage()]);
       }
   }

   public function edit($id)
   {
       $Patient = Patient::findorfail($id);
       return view('Dashboard.Patients.edit',compact('Patient'));
   }
   public function update($request)
   {
    $patient = Patient::find($request->id);

    if (!$patient) {
        return redirect()->back()->withErrors(['error' => 'Patient not found']);
    }
       try {
           $patient->Numero_Assure = $request->Numero_Assure;
           $patient->Nom_Assure = $request->Nom_Assure;
           $patient->Prenom_Assure = $request->Prenom_Assure;
           $patient->Date_Naiss_Assure = $request->Date_Naiss_Assure;
           $patient->Lieu_Naissance = $request->Lieu_Naissance;
           $patient->Sexe_Assure = $request->Sexe_Assure;
           $patient->Civilite = $request->Civilite;
           $patient->Grade = $request->Grade;
           $patient->Matricule = $request->Matricule;
           $patient->Adresse = $request->Adresse;
           $patient->Telephone = $request->Telephone;
           $patient->Service = $request->Service;
           $patient->MGSN = $request->MGSN;
           $patient->Blood_Group = $request->Blood_Group;
           $patient->save();

           session()->flash('edit');
           return redirect()->route('Patients.index');
       } catch (\Exception $e) {
           return redirect()->back()->withErrors(['error' => $e->getMessage()]);
       }
   }
   public function show($id)
   {
       // Retrieve the patient details from the database
       $patient = Patient::find($id);
       $beneficiaries = AyantDroit::where('patient_id', '=', $id)->get();
       // Check if the patient is found
       if ($patient) {
           // If the patient is found, load the show.blade.php view and pass the patient data to it
           return view('Dashboard.Patients.show', compact('patient','beneficiaries'));
       } else {
           // If the patient is not found, you can handle the error accordingly, such as redirecting to a 404 page
           abort(404);
       }
   }


   public function destroy($request)
   {
       Patient ::destroy($request->id);
       session()->flash('delete');
       return redirect()->back();
   }
}
