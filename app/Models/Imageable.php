<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Imageable extends Model
{
    protected $fillable = [
        'imageable_type',
        'imageable_id',
        'path',
        'size',
    ];

    public function product()
    {
        return $this->morphTo();
    }
}
