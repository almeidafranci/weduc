<?php

namespace Database\Seeders;

use App\Models\ReducFunction;
use Illuminate\Database\Seeder;

class ReducFunctionSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    ReducFunction::factory()->create();
  }
}
