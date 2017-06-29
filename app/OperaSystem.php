<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperaSystem extends Model
{
    protected $table = 'opera_systems';
    protected $fillable = [
        'opera_system',
        'chipset'
        'cpu_speed',
        'cpu',
        'create_at',
        'update_at'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
