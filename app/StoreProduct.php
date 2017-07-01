<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreProduct extends Model
{
    protected $table = 'product_stores';
    protected $fillable = [
        'product_id',
        'store_id',
        'quantity'
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
