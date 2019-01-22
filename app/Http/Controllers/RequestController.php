<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Request as BookRequest;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        
        $userRequests = BookRequest::all()
            ->where('user_id','==',''.auth()->user()->id)->where('status','==', 'active');
        if($userRequests->count() >= 5){
            return response()->json('Nuk mund te rezervosh me shume se 5 libra.',Response::HTTP_FORBIDDEN);
        }

        
        
        $req = \App\Request::all();
        foreach ($req as $r) {
            
            if($r->book_id == $request->book_id && $r->user_id == Auth::User()->id && $r->borrow->status == 'returned'){
              $r->borrow->delete();
              $r->delete();
              return response()->json('Libri ishte i rezervuar edhe i kthyer nesse doni ta rezervoni perseri shtypni butonin!',Response::HTTP_FORBIDDEN);
            }
            if($r->book_id == $request->book_id && $r->user_id == Auth::User()->id){
                return response()->json('Libri eshte i rezervuar!',Response::HTTP_FORBIDDEN);
            }
            
        
        }


        $req = \App\Request::all();
        foreach ($req as $r) {
            if($r->book_id == $request->book_id && $r->user_id == Auth::User()->id && $r->borrow->status == 'returned'){
                return response()->json(array('timeLeft'=> $timeLeft,'req_id'=> $bookRequest->id),Response::HTTP_OK);
            }
        }


        
        if(Auth::check() && isset($request->book_id)){

            $now = Carbon::now();


            $bookRequest = new BookRequest;
            $bookRequest->req_start = $now;
            $bookRequest->req_end = $now->copy()->addDays(1);
            $bookRequest->user_id = Auth::id();
            $bookRequest->status = 'active';
            $bookRequest->book_id = $request->book_id;
            $bookRequest->save();



            $timeLeft = $now->diffInHours(Carbon::parse($bookRequest->req_end   ));

            
            return response()->json(array('timeLeft'=> $timeLeft,'req_id'=> $bookRequest->id),Response::HTTP_OK);
        }
        else{
            return response()->setStatusCode(Response::HTTP_BAD_REQUEST);
        }

        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $req = BookRequest::find($id);

        $res = $req->delete();

        return response()->json($res);
    }
}
