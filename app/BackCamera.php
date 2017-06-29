<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BackCamera extends Model
{
    protected $table = 'back_cameras';
    protected $fillable = [
        'resolution',
        'film',
        'flash',
        'advanced_photography',
        'create_at',
        'update_at'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
