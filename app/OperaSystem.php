<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperaSystem extends Model
{
    protected $table = 'opera_systems';
    protected $fillable = [
        'opera_system',
        'chipset',
        'cpu_speed',
        'cpu'
    ];

    public function product()
    {
        return $this->hasOne('App\Product');
    }
}
