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
    'is_private',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'id',
    'user_id',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [];


  /**
   * The attributes that aren't mass assignable.
   *
   * @var array
   */
  protected $guarded = [];

  public function dataType()
  {
    return $this->hasOne(DataType::class);
  }

  public function operators()
  {
    return $this->hasOne(Operator::class);
  }

  public function functions()
  {
    return $this->hasMany(ReducFunction::class);
  }

  public function programs()
  {
    return $this->hasMany(Program::class);
  }

  public function controlFlowStatements()
  {
    return $this->hasOne(ControlFlow::class);
  }

  public function getDataType($key)
  {
    return $this->dataType->$key;
  }
}
