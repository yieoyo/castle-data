<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\Company;
use App\Models\Fiscal;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{
    protected $model = Activity::class;

    public function definition()
    {
        return [
            'company_id' => Company::inRandomOrder()->first()->id,
            'id_actividad' => Fiscal::inRandomOrder()->first()->id,
            'prioridad' => $this->faker->randomElement(['low', 'medium', 'high']),
            'date' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
