<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'user_id',
    'programming_language_id',
    'name',
    'blockly_code',
    'reduc_code',
    'custom_code',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [];

  /**
   * Get the programming language that owns the program.
   */
  public function language()
  {
    return $this->belongsTo(ProgrammingLanguage::class, 'programming_language_id');
  }

  /**
   * Scope a query to only include programs of a specific language.
   *
   * @param \Illuminate\Database\Eloquent\Builder $query
   * @param \App\Models\ProgrammingLanguage
   * @return \Illuminate\Database\Eloquent\Builder
   */
  public function scopeOfLanguage(Builder $query, ProgrammingLanguage $language)
  {
    return $query->where('programming_language_id', $language->id);
  }
}
