<?php

namespace Database\Factories;

use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Program::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => "1",
            'programming_language_id' => "1",
            'name' => "ProgramaTeste",
            'blockly_code' => null,
            'reduc_code' => "inicio enquanto(verdadeiro)farei{se(verdadeiro)entao{}senao se(verdadeiro)entao{}senao{} } fim",
            'custom_code' => null
        ];
    }
}
