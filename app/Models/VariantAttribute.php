<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VariantAttribute extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'variant_id',
        'attribute_id',
        'attribute_value_id'
    ];
    public function productVariant(){
        return $this->belongsTo(ProductVariant::class,'variant_id');
    }
    public function attribute(){
        return $this->belongsTo(Attribute::class,'attribute_id');
    }
    public function attributeValue(){
        return $this->belongsTo(AttributeValue::class,'attribute_value_id');
    }
}
