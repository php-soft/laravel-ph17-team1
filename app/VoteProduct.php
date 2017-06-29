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
        'comment',
        'create_at',
        'update_at'
    ];

    public function votes()
    {
        return $this->hasMany('App\Vote');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
