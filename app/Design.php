<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    protected $table = 'designs';
    protected $fillable = [
        'design',
        'material',
        'size',
        'weigth',
        'create_at',
        'update_at'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
