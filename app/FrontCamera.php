<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrontCamera extends Model
{
    protected $table = 'front_cameras';
    protected $fillable = [
        'resolution1',
        'resolution2',
        'videocall',
        'other_info'
    ];

    public function product()
    {
        return $this->hasOne('App\Product');
    }
}
