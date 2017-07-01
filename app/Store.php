<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';
    protected $fillable = [
        'name',
        'slug',
        'phonenumber',
        'email',
        'address',
        'image',
        'location',
        'description',
        'status'
    ];

    public function storeProducts()
    {
        return $this->belongsToMany('App\StoreProduct');
    }
}
