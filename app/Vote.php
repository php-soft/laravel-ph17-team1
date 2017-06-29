<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = 'votes';
    protected $fillable = [
        'star',
        'create_at',
        'update_at'
    ];

    public function voteProducts()
    {
        return $this->belongsToMany('App\VoteProduct');
    }
}
