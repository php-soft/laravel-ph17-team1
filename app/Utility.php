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
        'music',
        'create_at',
        'update_at'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
