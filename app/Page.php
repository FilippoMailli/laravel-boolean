<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsTo('App\Tag');
    }

    public function photos()
    {
        return $this->belongsTo('App\Photo');
    }
}
