<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromotionProduct extends Model
{
    protected $table = 'promotion_products';
    protected $fillable = [
        'product_id',
        'promotion_id'
    ];

    public function promotions()
    {
        return $this->hasMany('App\Promotion');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
