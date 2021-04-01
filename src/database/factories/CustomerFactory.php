<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'shippingStreet' => $this->faker->streetAddress,
            'shippingCity' => $this->faker->city,
            'shippingStateProvince' => $this->faker->stateAbbr,
            'shippingCountry' => $this->faker->country,
            'shippingZipPostal' => $this->faker->postcode,
            'shippingPhone' => $this->faker->phoneNumber,
            'shippingEmail' => $this->faker->email,
            'billingStreet' => $this->faker->streetAddress,
            'billingCity' => $this->faker->city,
            'billingStateProvince' => $this->faker->stateAbbr,
            'billingCountry' => $this->faker->country,
            'billingZipPostal' => $this->faker->postcode,
        ];
    }
}
