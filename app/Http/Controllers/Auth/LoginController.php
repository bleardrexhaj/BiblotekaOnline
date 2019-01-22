<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->redirectTo = url()->previous();
        //$this->middleware('guest')->except('logout');
    }
    /**
     * Kyqu duke perdorur pid--Personal ID
     *
     * @override username(), Illuminate\Foundation\Auth\AuthenticatesUsers;
     */

    public function username()
    {
        return 'pid';
    }
    public function test()
    {
        $a = request('pid');
        $b = request('password');
       
        if (Auth::attempt([ 'pid' => $a, 'password' => $b])) {
            return redirect('/home');
        }else{
         return redirect('/login');
        }
    }
    public function validate_login(Request $request){
       // return Validator::make($request, [
         //   'pid'=>'required|min:9|max:10|exist:users,pid',
          //  'password'=>'required|min:6',
        //]);
    }
  
}
