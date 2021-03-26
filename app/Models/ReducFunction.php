<?php

namespace App\Models;

use App\Models\ProgrammingLanguage;
use Illuminate\Database\Eloquent\Model;

class ReducFunction extends Model
{
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
