<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuidAsPrimaryKey;

class Category extends Model
{
    use HasFactory, HasUuidAsPrimaryKey;

    protected $keyType = 'string';

    public $increment = false;

    protected $fillable = [
        'store_id',
        'name',
    ];
}
