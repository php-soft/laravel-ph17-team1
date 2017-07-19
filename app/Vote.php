<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vote extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
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
