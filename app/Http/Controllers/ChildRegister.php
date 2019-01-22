<?php

namespace App\Http\Controllers;

use \App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;

class ChildRegister extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'pid'=>'required|min:9|max:15|unique:users,pid',
            'name'=>'required|min:3|max:30',
            'surname'=>'required|min:3|max:30',
            'dob'=>'required|date',
            'email'=>'required|email|unique:users,email',
            'address'=>'required|min:6|max:120',
            'phone'=>'required|digits_between:9,15',
            'password'=>'required|min:6',
            'password-confirm'=>'required|same:password'
        ]);
    }
     /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $data)
    {
    	
    	$validatedData = $data->validate([
       //'pid'=>'required|min:9|max:10|unique:users,pid',
       'name'=>'required|min:6|max:30',
       'dob'=>'required|date',
       //'email'=>'required|email|unique:users,email',
       //'address'=>'required|min:6|max:120',
       //'phone'=>'required|digits_between:9,15',
       'password'=>'required|min:6',
       'password-confirm'=>'required|same:password']);
 
        $t = 1;
        foreach (Auth::user()->minors as $minor) {
        	$t +=1;
        }


        if(Auth::user()->minors->count() < 3){
        	$pi = Auth::User()->id;
        $user = new User;
            $user->pid=Auth::User()->pid.'-'.$t;
            $user->name=$data['name'].' '.$data['surname'];
            $user->dob=$data['dob'];
            $user->email=$data['email'];
            $user->address=Auth::user()->address;
            $user->phone=Auth::user()->phone;
            $user->password=Hash::make($data['password']);
            $user->parent_id=$pi;
            
            
            
        if($user->save()){
        	
        	return redirect('home');
        }else{
        	return redirect()->back();
        }
     }else{
         $t = 'Limiti per te regjistruar Femije eshte 3!!!';
     	 return view('home',['t'=>$t]);
     }

    }
    function index(){
    	if(Auth::user()->parent_id != null){
    		return redirect('home');
    	}else{
        return view('childregister');
    }
    }
}
