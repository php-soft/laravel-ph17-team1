<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Screen extends Model
{
    protected $table = 'screens';
    protected $fillable = [
        'tech_screen',
        'resolution',
        'width_screen',
        'touch_screen'
    ];

    public function product()
    {
        return $this->hasOne('App\Product');
    }
}
