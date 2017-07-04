<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = 'votes';
    protected $fillable = [
        'customer_id',
        'product_id',
        'name',
        'phone',
        'email',
        'star',
        'comment'
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
