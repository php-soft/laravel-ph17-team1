<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $fillable = [
        'customer_id',
        'product_id',
        'comment'
    ];

    public function product()
    {
        return $this->hasOne('App\Review');
    }
}
