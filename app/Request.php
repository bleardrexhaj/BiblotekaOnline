<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function borrow(){
        return $this->hasOne('App\Borrow');
    }


    public function book(){
        return $this->belongsTo('App\Book');
    }


}
