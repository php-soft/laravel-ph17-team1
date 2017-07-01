<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Connect extends Model
{
    protected $table = 'connects';
    protected $fillable = [
        'network_mobile',
        'sim',
        'wifi',
        'gps',
        'bluetooth',
        'connect_port',
        'jack_phone',
        'other_connect'
    ];

    public function product()
    {
        return $this->hasOne('App\Product');
    }
}
