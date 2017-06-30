<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotions';
    protected $fillable = [
        'name',
        'start_date',
        'end_date'
    ];

    public function promotionProducts()
    {
        return $this->belongsToMany('App\Promotion_Product');
    }
}
