<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * Returns all the books that belong to THIS author
     *
     */
    public function books()
    {
        return $this->belongsToMany('App\Book');

    }
    public function getNumberOfBooksAttribute()
    {

        return $this->books()->count();
    }
}
