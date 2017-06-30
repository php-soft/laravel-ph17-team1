<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoteProduct extends Model
{
    protected $table = 'vote_products';
    protected $fillable = [
        'customer_id',
        'product_id',
        'star_id',
        'comment'
    ];

    public function votes()
    {
        return $this->hasMany('App\Vote');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
