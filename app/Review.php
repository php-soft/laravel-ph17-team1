<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
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
