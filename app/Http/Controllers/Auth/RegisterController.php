<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
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
        $this->middleware('guest');
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
    protected function create(array $data)
    
    {
        return User::create([
            'pid'=>$data['pid'],
            'name'=>$data['name'].' '.$data['surname'],
            'dob'=>$data['dob'],
            'email'=>$data['email'],
            'address'=>$data['address'],
            'phone'=>$data['phone'],
            'password'=>Hash::make($data['password']),
            'active'=>false,
            
        ]);
    }
    
}
