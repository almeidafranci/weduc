<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
//use Spatie\MediaLibrary\HasMedia\HasMedia;

class ProgrammingLanguage extends Model //implements HasMedia
{
    //use HasMediaTrait;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'black_list_keywords' => 'array'
    ];

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
