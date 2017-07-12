<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BackCamera extends Model
{
    protected $table = 'back_cameras';
    protected $fillable = [
        'resolution1',
        'resolution2',
        'film',
        'flash',
        'advanced_photography'
    ];

    public function product()
    {
        return $this->hasOne('App\Product');
    }
}
