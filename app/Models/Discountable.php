<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discountable extends MorphPivot
{
    use SoftDeletes;
    protected $fillable=[
        'discount_id',
        'used',
        'discountable_id',
        'discountable_type',
    ];

}
