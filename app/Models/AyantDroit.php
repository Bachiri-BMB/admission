<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AyantDroit extends Model
{
    use HasFactory;
    protected $table = 'ayant_droit';

    protected $fillable = [
        'Nom', 'Prénom', 'Date_naissance', 'Sexe', 'Lien_parenté', 'N_SS_malade', 'patient_id'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }
}
