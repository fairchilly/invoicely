<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Company;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => Company::all()->random()->id,
            'customer_id' => Customer::all()->random()->id,
            'invoice_number' => strval($this->faker->numberBetween(10000, 99999)),
            'issued_date' => $this->faker->date,
            'due_date' => $this->faker->date,
            'comments' => $this->faker->sentence,
            'is_paid' => $this->faker->boolean,
        ];
    }
}
