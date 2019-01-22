<?php

namespace App\Http\Controllers;

use App\Book;
use App\Author;
use App\Category;
use App\Subcategory;
use App\Tag;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

class BrowseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){

//        TODO: Implemento TNTSearch ose Angolia ose... PEr shkak te performances ne db
        //TODO: Implemento Scheduler per me ba update prej Redis prej memcache
        //TODO:

        $books = Book::where('title','LIKE','%'.$request->term.'%')->get();
        $authors = Author::where('name','LIKE','%'.$request->term.'%')->get();
        $tags= Tag::where('name','LIKE','%'.$request->term.'%')->get();
        $categories= Category::where('name','LIKE','%'.$request->term.'%')->get();

        

        // $result = (['books'=>$books,
        //         'authors'=>$authors,
        //         'tags'=>$tags,
        //         'categories'=>$categories,
        //         'term'=>$request->term]);
        
        return view('browse.search',
            [
                'books'=>$books,
                'authors'=>$authors,
                'tags'=>$tags,
                'categories'=>$categories,
                'term'=>$request->term
            ]);
    }
    public function specsearch(Request $request){
          
         
         $query = request('query');

         $radio = $request->get('inlineRadioOptions', 0);
         

         
          if($radio == 'Title')
          {
            $t = "Titulli";
            $name = 'searchByTitle';
            $books = Book::where('title','LIKE','%'.$query.'%')->get();
            if ($books->count()) {
           
              }else{
              $books = 'Ska Rezultate';
            }


            
         }
            else if($radio == 'Autor'){
                $t1 = "Autori";
                $name = 'searchByAuthor';
                $Author = Author::where('name','LIKE','%'.$query.'%')->get();
 
              if ($Author->count()) {
           
              }else{
              $Author = 'Ska Rezultate';
            }

          
        
         }
         
         $j = 1;
         return view('browse.result',compact('books','Author','t','t1','j'));
        

    }
    public function index()
    {

        $categories = Category::all();
//        $tags= Tag::all();
        return view('browse.browse',['categories'=>$categories]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('browse.search');
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
