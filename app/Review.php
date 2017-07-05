<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $fillable = [
        'product_id',
        'name',
        'email',
        'phone',
        'comment'
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
