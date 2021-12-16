<?php

namespace Database\Factories;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Factories\Factory;

class BankFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bank::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid' => $this->faker->unique()->uuid(),
            'name_bank' => $this->faker->state(),
            'code_bank' => $this->faker->iban(),
            'number_bank' => $this->faker->bankAccountNumber(),
            'method_bank' => 'BCA'
        ];
    }
}
