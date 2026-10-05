<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Courier extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'price',
        'is_active',
        'delivery_business_days',
    ];

    public function getActive(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->is_active == 'active' ? 'فعال' : 'غیرفعال'
        );
    }
}
