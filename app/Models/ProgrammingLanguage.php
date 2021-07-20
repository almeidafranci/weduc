<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
//use Spatie\MediaLibrary\HasMedia\HasMedia;

class ProgrammingLanguage extends Model //implements HasMedia
{
  //use HasMediaTrait;
  use HasFactory;
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'user_id',
    'keywords_language',
    'name',
    'description',
    'robot',
    'call_function',
    'compile_code',
    'compiler_file',
    'extension',
    'header',
    'footer',
    'main_function',
    'other_functions',
    'send_code',
    'sent_extension',
    'data_types',
    'control_flows',
    'data_operators',
    'is_private',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'user_id',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'data_types' => 'array',
    'control_flows' => 'array',
    'data_operators' => 'array',
  ];


  /**
   * The attributes that aren't mass assignable.
   *
   * @var array
   */
  protected $guarded = [];

  public function functions()
  {
    return $this->hasMany(ReducFunction::class);
  }

  public function programs()
  {
    return $this->hasMany(Program::class);
  }
}
