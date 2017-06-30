<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = 'votes';
    protected $fillable = [
        'star'
    ];

    public function voteProducts()
    {
        return $this->belongsToMany('App\VoteProduct');
    }
}
