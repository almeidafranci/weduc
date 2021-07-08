<?php

namespace Database\Factories;

use App\Models\ReducFunction;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReducFunctionFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = ReducFunction::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'programming_language_id' => '1',
      'name' => 'esperar',
      'description' => 'Espera de um tempo em milissegundos antes de executar o próximo comando. Os valores devem ser sempre inteiros maiores que 0.',
      'category' => json_encode(['tempo']),
      'return_type' => 'void',
      'return_description' => 'Função esperar não tem retorno.',
      'reduc_code' => 'esperar()',
      'code' => 'bc.Wait((int)var1(int));',
      'parameters' => '1',
      'parameters_list' =>  json_encode([['name' => 'Tempo', 'type' => 'numero', 'description' => 'Tempo em milissegundos']]),
      'example_list' => json_encode(['source' => ['code' => 'esperar(1000)', 'description' => ''], 'language' => ['code' => 'bc.wait(1000);', 'description' => '']]),
      'state' => '1'
    ];
  }
}
