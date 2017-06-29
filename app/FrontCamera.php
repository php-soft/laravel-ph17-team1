<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrontCamera extends Model
{
    protected $table = 'front_cameras';
    protected $fillable = [
        'resolution',
        'videocall', 
        'other_info',
        'create_at',
        'update_at'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
