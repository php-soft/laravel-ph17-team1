<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    protected $table = "reply";
    protected $fillable = [
        'content', 'user_id', 'news_comment_id'
    ];
    public function comment()
    {
        return $this->belongsTo('App\NewsComment');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
