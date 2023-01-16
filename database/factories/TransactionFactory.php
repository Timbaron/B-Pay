<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'type' => $this->faker->randomElement(['debit', 'credit']),
            'amount' => $this->faker->randomFloat(2, 0, 10000),
            'Description' => $this->faker->text(100),
            'Status' => $this->faker->boolean(50),
            'transaction_id' => uniqid('BPAY-'),
            'to' => $this->faker->name,
            'from' => $this->faker->name,
        ];
    }
}
