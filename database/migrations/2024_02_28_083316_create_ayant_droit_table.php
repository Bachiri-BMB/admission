<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAyantDroitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ayant_droit', function (Blueprint $table) {
            $table->id();
            $table->string('N_SS_malade')->unique();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->string('Nom');
            $table->string('Prénom');
            $table->date('Date_naissance');
            $table->string('Sexe');
            $table->enum('Lien_parenté', ['Ascendant', 'Descendant', 'Conjoint', 'Enfant']);
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
        Schema::dropIfExists('ayant_droit');
    }
}
