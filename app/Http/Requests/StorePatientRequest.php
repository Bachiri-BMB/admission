<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "Nom_Assure" => 'required',
            "Numero_Assure " => 'required|sometimes',
            "Prenom_Assure" => 'required',
            'Date_Naiss_Assure' => 'required|date|date_format:Y-m-d',
            "Sexe_Assure" => 'required',
            "Service" => 'required',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
