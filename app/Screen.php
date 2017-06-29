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
        'touch_screen',
        'create_at',
        'update_at'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
