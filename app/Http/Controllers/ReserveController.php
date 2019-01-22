<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request as Req;

class ReserveController extends Controller
{
    function index(){
        $Requests = Req::all()->reverse();
    	return view('admin.reserve',['Requests'=> $Requests]);
    }
}
