<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//use Illuminate\Support\Collection;



class Book extends Model
{
    public function addedBy()
    {
        return $this->belongsTo('App\User','created_by');
    }

    public function savedByUsers()
    {
        return $this->belongsToMany('App\User','saved_books');
    }

    public function isbns(){
        return $this->hasMany('App\Isbn');
    }

    public function language(){
        return $this->belongsTo('App\Language');
    }

    public function requests()
    {
        return $this->hasMany('App\Request');
    }

    public function authors()
    {
        return $this->belongsToMany('App\Author');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function publisher(){
        return $this->belongsTo('App\Publisher');
    }

    public  function getTopThreeAttribute()
    {

        return $this->requests()->whereDate('created_at', '>=', date('m') - 1)->count('id');


    }
    public function getCategoryBooksAttribute()
    {
        $books = array();
        foreach ($this->categories as $category){
            foreach ($category->books as $book){
                $books[] = $book;
            }
        }

        return \Illuminate\Database\Eloquent\Collection::make($books);
    }


    public function getBorrowsAttribute()
    {

        $borrows = array();
        foreach ($this->requests as $request) {
            $borrows[] = $request->borrow;
        }
        return \Illuminate\Database\Eloquent\Collection::make($borrows);


    }

    public function getAvailableStockAttribute()
    {
        $notReturned = $this->borrows->where('status', 'not_returned')->count();
        $currentlyBorrowed = $this->currentlyBorrowed;

        $stock = $this->stock - $notReturned - $currentlyBorrowed;
        return $stock;
    }

    public function getOnHoldAttribute()
    {
        return $this->requests->where('status', 'active')->count();
    }

    public function getcurrentlyBorrowedAttribute()
    {
        return $this->borrows->where('status', 'active')->count();
    }







//    public function categories()
//    {
//
//        return $this->belongsToMany('App\Category');
//
//    }
//
//    public function authors()
//    {
//        return $this->belongsToMany('App\Author');
//    }
//
//    public function requests()
//    {
//        return $this->belongsToMany('App\Request');
//    }
//
//    public function onHold()
//    {
//        return $this->requests()->where('status', 'active')->count();
//    }
//
//    public function borrows()
//    {
//       return $this->requests()->with('borrow')->get();
//    }
//    public function currently_borrows(){
//        return $this->borrows()->count();
//    }
//
//    public function avilableStock()
//    {
//        $stock = $this->stock;
//        $borrowed = $this->borrows()->count();
//        $neverReturned = $this->borrows()->where('status', 'not_returned')->count();
//        $avilable_stock = $stock - $borrowed - $neverReturned;
//
//        return $avilable_stock;
//    }
}
