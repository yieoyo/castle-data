<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition()
    {
        return [
            'cuit' => $this->faker->unique(),
            'razon_social' => $this->faker->company,
            'direction' => $this->faker->address,
            'provincia' => $this->faker->state,
            'localidad' => $this->faker->city,
        ];
    }
}
