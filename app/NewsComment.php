<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsComment extends Model
{
    protected $table = "news_comments";
    protected $fillable = [
        'content', 'user_id', 'news_id', 'like'
    ];
    public function news()
    {
        return $this->belongsTo('App\ListNew');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function replies()
    {
        return $this->hasMany('App\Reply');
    }
}
