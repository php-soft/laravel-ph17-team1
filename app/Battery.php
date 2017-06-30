<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Battery extends Model
{
    protected $table = 'batteries';
    protected $fillable = [
        'battery_capacity',
        'battery_type',
        'battery_tech'
    ];

    public function product()
    {
        return $this->hasOne('App\Product');
    }
}
