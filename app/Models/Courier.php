<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;

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

    public function priceText():Attribute{
        return Attribute::get(fn()=>$this->price>0?numberFormatAble($this->price / 10):'رایگان');
    }

    public function scopeSearch(Builder $builder){
        $builder->when(request()->query('q'),function ($query,$value){
            $query->where('name','like',"%{$value}%");
        });
    }
}
