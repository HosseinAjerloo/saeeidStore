<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;
    public $table='address';
    protected $fillable = [
        'user_id',
        'province_id',
        'city_id',
        'name',
        'family',
        'phone_number',
        'number',
        'postal_code',
        'house_number',
        'default_address',
        'full_address',
    
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function province()
    {
        return $this->belongsTo(User::class, 'province_id');
    }
    public function city()
    {
        return $this->belongsTo(User::class, 'city_id');
    }
}
