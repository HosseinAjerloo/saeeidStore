<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;

class Slider extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'group_id',
        'title',
        'description',
        'is_active',
    ];

    public function image()
    {
        return $this->morphOne(Imageable::class, 'imageable');
    }

    public function group()
    {
        return $this->belongsTo(ProductGroup::class, 'group_id');
    }

    public function getActive(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->is_active == 'active' ? 'فعال' : 'غیرفعال'
        );
    }

    #[Scope]
    public function scopeSearch(Builder $builder)
    {
        $builder->when(request()->query('q'), function ($query, $value) {
            $query->where('title', 'like', "%{$value}%");
        });
    }
}
