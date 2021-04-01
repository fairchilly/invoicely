<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'invoice_id' => Invoice::all()->random()->id,
            'description' => $this->faker->sentence(3),
            'units' => $this->faker->numberBetween(1, 30),
            'price_per_unit' => $this->faker->numberBetween(1000, 4000),
            'rank' => $this->faker->numberBetween(1, 100),
        ];
    }
}
