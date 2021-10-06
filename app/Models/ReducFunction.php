<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReducFunction extends Model
{
  use HasFactory;
  /**
   * The attributes that aren't mass assignable.
   *
   * @var array
   */
    protected $guarded = [];

    /**
     * Get the programming language that owns the function.
     */
    public function language()
    {
        return $this->belongsTo(ProgrammingLanguage::class, 'programming_language_id');
    }
}
