<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Battery extends Model
{
    protected $table = 'batteries';
    protected $fillable = [
        'battery_capacity',
        'battery_type',
        'battery_tech',
        'create_at',
        'update_at'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
