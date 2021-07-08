<?php

namespace Database\Factories;

use App\Models\ProgrammingLanguage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgrammingLanguageFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = ProgrammingLanguage::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'user_id' => "1",
      'name' => "c#",
      'description' => "c#",
      'robot' => "",
      'call_function' => "",
      'compile_code' => "",
      'compiler_file' => "",
      'extension' => "",
      'header' => null,
      'footer' => null,
      'main_function' => "void Main() { comandos }",
      'other_functions' => "void funcao() { comandos }",
      'send_code' => "",
      'sent_extension' => "",
      'is_private' => "0",
    ];
  }
}
