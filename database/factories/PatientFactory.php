<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

                'Numero_Assure' => $this->faker->unique()->randomNumber(8),
                'Nom_Assure' => $this->faker->lastName,
                'Prenom_Assure' => $this->faker->firstName,
                'Date_Naiss_Assure' => $this->faker->date(),
                'Lieu_Naissance' => $this->faker->city,
                'Sexe_Assure' => $this->faker->randomElement(['Male', 'Female']),
                'Civilite' => $this->faker->randomElement(['Mr', 'Mrs', 'Miss']),
                'Grade' => $this->faker->word,
                'Matricule' => $this->faker->unique()->randomNumber(6),
                'Adresse' => $this->faker->address,
                'Telephone' => $this->faker->unique()->phoneNumber,
                'Service' => $this->faker->randomElement(['Cardiology', 'Neurology', 'Oncology', 'Orthopedics']),
                'MGSN' => $this->faker->randomNumber(6),
                'Blood_Group' => $this->faker->randomElement(['A+', 'B+', 'AB+', 'O+', 'A-', 'B-', 'AB-', 'O-']),

        ];
    }
}
