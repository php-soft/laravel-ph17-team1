<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreProduct extends Model
{
    protected $table = 'store_products';
    protected $fillable = [
        'product_id',
        'store_id',
        'quantity',
        'create_at',
        'update_at'
    ];

    public function stores()
    {
        return $this->hasMany('App\Store');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
