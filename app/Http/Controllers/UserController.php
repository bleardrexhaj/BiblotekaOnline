<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Hash;
use RegistersUsers;
use App\Book;
use App\Category;
use App\Language;
use App\Publisher;
use App\Tag;


class UserController extends Controller
{
	public function __construct(){
    	$this->middleware('auth');
    }


    function saveBook(Request $request){

        $user = Auth::user();



        $result = $user->savedBooks()->toggle($request->book_id);



        return response()->json();

    }
    

    function index(){
    	$this->middleware('auth');
    	return view('admin.user.user_create');
    }
    function showall(){
    
    	$users = User::all();
    	return view('admin.user.user_show',['users'=>$users]);
    }
    function deleteuser(){
    	$users = User::all();
    	return view('admin.user.user_delete',['users'=>$users]);
    }

    function userdelete(request $request){
    	$request->validate(['button1'=>'required']);
    	$v = request('button1');

        $user = User::find($v);
    	
    	$usr = new Book;
        $book = Book::all();
        
    	foreach ($book as $usr) {
            
            if($usr->created_by == $v){
    		$usr->created_by = '31';
    		
    		$usr->save();
    	}
    	}


    	$ca = new Category;
        $cat = Category::all();
        
    	foreach ($cat as $ca) {
    		if($ca->created_by == $v){

    		$ca->created_by = '31';
    		$ca->save();
    	}
        }

        $la = new Language;
        $lan = Language::all();
        
    	foreach ($lan as $la) {
    		if($la->created_by == $v){

    		$la->created_by = '31';
    		$la->save();
    	}
        }


        $pu = new Publisher;
        $pub = Publisher::all();
        
    	foreach ($pub as $pu) {
    		if($pu->created_by == $v){

    		$pu->created_by = '31';
    		$pu->save();
    	}
        }

        $ta = new Tag;
        $tag = Tag::all();
        
    	foreach ($tag as $ta) {
    		if($ta->created_by == $v){

    		$ta->created_by = '31';
    		$ta->save();
    	}
        }

        $re = new \App\Request;
        $req = \App\Request::all();
        
        
    	foreach ($req as $re) {
    		if($re->user_id == $v){

    		$re->delete();
    		
    	}
        }

        $user->savedBooks()->detach();

    	$a = $user -> delete();
        

    	if($a){
    		return redirect()->back();
    	}


    }
    
    


    protected function register(Request $data)
    {
            $validatedData = $data->validate([
            'pid'=>'required|min:8|max:15|unique:users,pid',
            'name'=>'required|min:3|max:30',
            'surname'=>'required|min:3|max:30',
            'dob'=>'required|date',
            'email'=>'required|email|unique:users,email',
            'address'=>'required|min:6|max:120',
            'phone'=>'required|digits_between:9,15',
            'password'=>'required|min:6',
            'password-confirm'=>'required|same:password',
            'user_type' =>'required'

        ]);


            $user = new User;

            $user->pid=$data->pid;
            $user->name=$data['name'].' '.$data['surname'];
            $user->dob=$data['dob'];
            $user->email=$data['email'];
            $user->address=$data['address'];
            $user->phone=$data['phone'];
            $user->user_type = $data['user_type'];
            $user->password=Hash::make($data['password']);
            
            
            //$user->active=false;
            $user->save();
            
            $user->save();
            if($user->save()){
            	return redirect('/user/all');
            }
        
    }



}
