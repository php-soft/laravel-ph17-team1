<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BackCamera extends Model
{
    protected $table = 'back_cameras';
    protected $fillable = [
        'resolution',
        'film',
        'flash',
        'advanced_photography'
    ];

    public function product()
    {
        return $this->hasOne('App\Product');
    }
}
