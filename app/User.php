<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pid', 'name', 'address', 'dob', 'phone', 'email', 'password','udc_code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        if ($this->user_type=='admin'){
            return true;
        }
        return false;
    }
    public function requests()
    {
        return $this->hasMany('App\Request');
    }
    public function minors()
    {
        return $this->hasMany('App\User','parent_id');
    }

    public function parent()
    {
        return $this->belongsTo('App\User','parent_id');
    }

    public function savedBooks()
    {
        return $this->belongsToMany('App\Book','saved_books')->withTimestamps();
    }

    public function getHasBookRequestedAttribute($book_id){
        $requests = $this->requests()
            ->where('status','=','active')->get();
        foreach ($requests as $request){

                if($request->book_id == $book_id){
                    $requestEndDate = Carbon::parse($request->req_end);
                    $now = Carbon::now();
                    $timeLeft = $now->diffInHours($requestEndDate);
                    return $timeLeft+1;
                }

        }
        return false;
    }
    public function getBookRequestIdAttribute($book_id){
        $requests = $this->requests()
            ->where('status','=','active')->get();
        foreach ($requests as $request){

                if($request->book_id == $book_id){
                    return $request->id;
                }

        }
        return false;
    }



}
