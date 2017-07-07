<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufactory extends Model
{
    protected $table = 'manufactories';
    protected $fillable = [
        'name',
        'slug',
        'phone',
        'address',
        'email',
        'image',
        'description',
        'location',
        'status'
    ];

    public function product()
    {
        return $this->hasMany('App\Product');
    }
}
