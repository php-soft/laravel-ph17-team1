<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utility extends Model
{
    protected $table = 'utilities';
    protected $fillable = [
        'advanced_security',
        'special_function',
        'recording',
        'radio',
        'movie',
        'music'
    ];

    public function product()
    {
        return $this->hasOne('App\Product');
    }
}
