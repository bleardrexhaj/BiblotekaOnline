<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request as Req;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home(){

    $books = \App\Book::query()->limit(4)->get();
    $books1 = \App\Book::get()->all();
    $CAT = \App\Category::query()->where('name','Computers and Tech')->first();
    $Kids = \App\Category::query()->where('name','Kids')->first();
   

  
    
    
    return view('welcome',['books'=>$books,'CAT'=>$CAT,'Kids'=>$Kids]);

    }
    public function index()
    {
        if (Auth::check()) {

        return view('home');
    }
    else{
        return redirect('/login');
    }
    }
    public function admin()
    {
       //  //Kontrollo per dublikim 
       //  $request = \App\Request::all();
       //  $request1 = \App\Request::all();
       //  $unique = $request->unique();
       //  $true = true;
       //  $i = 0;
       //  $j = 1;

       //  while($true){
       //  $req = $request[$i];
       //  $req1 = $request[$j];
       //  if($req->book->title == $req1->book->title && $req->user->name == $req1->user->name){
       //      $req->borrow()->delete();
       //      $req->delete();
       //      $j-=1;
       //      $i-=1;
       //  }
       //  $i+=1;
       //  $j+=1;
       //  if($j == $req->count()){
       //   $true = false;
       //  }
       // }
         if (Auth::check()) {
         $bookRequests = \App\Request::all();
         $bookBorrows = \App\Borrow::all();


        return view('admin.admin_main',['bookRequests'=>$bookRequests],['bookBorrows'=>$bookBorrows]);
    }else{
        return redirect('/login');
    }
    }
}
