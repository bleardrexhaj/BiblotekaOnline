<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ivory\GoogleMap\Helper\Builder\ApiHelperBuilder;
use Ivory\GoogleMap\Helper\Builder\MapHelperBuilder;
use Ivory\GoogleMap\Map;


class MapController extends Controller
{
    
    function index(){
    	
        return view('bibloteka');
    }

}
