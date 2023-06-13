<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Str;

trait HasUuidAsPrimaryKey
{
    public static function bootHasUuidAsPrimaryKey()
    {
        static::creating(function(Model $model) { 
            $model->setKeyType('string');
            $model->setIncrementing(false);
            $model->id = Str::uuid();
        });
    }
}