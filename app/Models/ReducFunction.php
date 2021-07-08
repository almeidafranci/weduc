<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class ReducFunction extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'programming_language_id',
    'name',
    'description',
    'category',
    'return_type',
    'return_description',
    'reduc_code',
    'code',
    'parameters',
    'parameters_list',
    'example',
    'state'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = ['parameters_list', 'example_list', 'state'];

  /**attributes that should be cast to native types
   * The .
   *
   * @var array
   */
  protected $casts = [
    'category' => 'array',
    'parameters_list' => 'array',
    'example_list' => 'array',
  ];

  /**
   * The accessors to append to the model's array form.
   *
   * @var array
   */
  protected $appends = ['parameters', 'examples'];

  /**
   * Formating Parameters.
   *
   * @return bool
   */
  public function getParametersAttribute()
  {
    return [
      "parameter_amount" => $this->attributes['parameters'],
      "parameter_list" => Arr::wrap(json_decode($this->parameters_list))
    ];
  }

  /**
   * Formating Examples.
   *
   * @return bool
   */
  public function getExamplesAttribute()
  {
    return json_decode($this->example_list);
  }
}
