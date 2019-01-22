<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Isbn extends Model
{
    protected $table = 'book_isbn';

    public function book(){
        $this->belongsTo('App\Book');
    }



}
