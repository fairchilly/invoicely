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
            'shipping_street' => $this->faker->streetAddress,
            'shipping_city' => $this->faker->city,
            'shipping_state_province' => $this->faker->stateAbbr,
            'shipping_country' => $this->faker->country,
            'shipping_zip_postal' => $this->faker->postcode,
            'shipping_phone' => $this->faker->phoneNumber,
            'shipping_email' => $this->faker->email,
            'billing_street' => $this->faker->streetAddress,
            'billing_city' => $this->faker->city,
            'billing_state_province' => $this->faker->stateAbbr,
            'billing_country' => $this->faker->country,
            'billing_zip_postal' => $this->faker->postcode,
        ];
    }
}
