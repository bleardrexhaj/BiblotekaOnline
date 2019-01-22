<?php

namespace App\Http\Controllers;

use App\Borrow;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrows = Borrow::all()->reverse();
        //dd($borrows[0]->request->user->name);
        return view('admin.borrow',['borrows' => $borrows]);
    }
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookRequests = \App\Request::all();
        
        
        return view('admin.borrow_create',['bookRequests'=>$bookRequests]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!isset($request->borrow_type)){
            $bookRequest = \App\Request::find($request->request_id) ;
            

            
            

            $borrow = new Borrow;
            $borrow->request_id = $bookRequest->id;
            $borrow->borrow_start = Carbon::today();
            $borrow->borrow_end = $request->borrow_end;
            $borrow->loaned_by = Auth::id();
            $borrow->status= 'active';

            $borrow->save();


            /*TODO: Shto opsonin ~finished ne kolonen "status", table Request*/
            $bookRequest->status = 'expired';
            $bookRequest->save();

        }
        else{

            $bookRequest = new \App\Request;
            $bookRequest->book_id = $request->book_id;
            $bookRequest->req_start = Carbon::today()->toDateString();
            $bookRequest->req_end = Carbon::today()->toDateString();
            $bookRequest->user_id = $request->user_id;

            /*TODO: Shto opsonin ~finished ne kolonen "status", table Request*/
            $bookRequest->status = 'expired';
            $bookRequest->save();



            $borrow = new Borrow;
            $borrow->request_id = $bookRequest->id;
            $borrow->borrow_start = Carbon::today();
            $borrow->borrow_end = $request->borrow_end;
            $borrow->loaned_by = Auth::id();
            $borrow->status= 'active';

            $borrow->save();




        }




        return back();



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
        //
    }



}
