<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('Numero_Assure')->unique();
            $table->string('Nom_Assure');
            $table->string('Prenom_Assure');
            $table->date('Date_Naiss_Assure');
            $table->string('Lieu_Naissance')->nullable();
            $table->string('Sexe_Assure');
            $table->string('Civilite')->nullable();
            $table->string('Grade');
            $table->string('Matricule');
            $table->string('Adresse');
            $table->string('Telephone')->unique();
            $table->string('Service');
            $table->string('MGSN')->nullable();
            $table->string('Blood_Group')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
