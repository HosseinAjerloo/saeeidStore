<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Discount extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'name',
        'type',
        'code',
        'value',
        'max_order_amount',
        'min_order_amount',
        'starts_at',
        'expires_at',
        'scope',
        'is_active',

    ];

    protected function generateDiscountCode(): string
    {
        do {
            $code = Str::upper(Str::random(10));
        } while (Discount::where('code', $code)->exists());

        return $code;
    }
    public function getActive(): Attribute
    {
        return Attribute::make(
            get: fn($value) =>$this->is_active=='1'?'فعال':'غیرفعال'
        );
    }
    #[Scope]
    public function scopeSearch(Builder $builder){
        $builder->when(request()->query('q'),function ($query,$value){
            $query->where('name','like',"%{$value}%")->orWhere('email',$value)->orWhere('mobile',$value);
        });
    }

}
