<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'street' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'stateProvince' => $this->faker->stateAbbr,
            'country' => $this->faker->country,
            'zipPostal' => $this->faker->postcode,
            'phone' => $this->faker->tollFreePhoneNumber,
            'email' => $this->faker->companyEmail,
        ];
    }
}
