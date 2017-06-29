<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';
    protected $fillable = [
        'name',
        'create_at',
        'update_at'
    ];
    
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
