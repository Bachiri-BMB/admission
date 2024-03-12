<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use Translatable;
    use HasFactory;
    public $translatedAttributes = ['name','Address'];
    protected $fillable = [
        'Numero_Assure',
        'Nom_Assure',
        'Prenom_Assure',
        'Date_Naiss_Assure',
        'Lieu_Naissance',
        'Sexe_Assure',
        'Civilite',
        'Grade',
        'Matricule',
        'Adresse',
        'Telephone',
        'Service',
        'MGSN',
        'Blood_Group'
    ];
    public function ayant_droits()
    {
        return $this->hasMany(AyantDroit::class);
    }

}
