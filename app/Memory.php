<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memory extends Model
{
    protected $table = 'memories';
    protected $fillable = [
        'ram',
        'rom',
        'available_memory',
        'external_memory_card'
    ];

    public function product()
    {
        return $this->hasOne('App\Product');
    }
}
