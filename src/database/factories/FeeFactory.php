<?php

namespace Database\Factories;

use App\Models\Fee;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $types = ['price', 'percentage'];
        $type = $types[$this->faker->numberBetween(0, 1)];

        if ($type == 'price') {
            $value = $this->faker->numberBetween(1000, 4000);
        } else {
            $value = $this->faker->numberBetween(5, 20);
        }

        return [
            'invoice_id' => Invoice::all()->random()->id,
            'description' => $this->faker->sentence(3),
            'value' => $value,
            'type' => $type,
            'rank' => $this->faker->numberBetween(1, 100),
        ];
    }
}
