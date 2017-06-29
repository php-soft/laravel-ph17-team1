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
        'external_memory_card',
        'create_at',
        'update_at'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
