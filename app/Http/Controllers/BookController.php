<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use View;
use App\Book;
use App\Author;
use App\Category;
use App\Isbn;
// Use View;
// use App\Http\Controllers\Controller;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::All();
        return view('admin.all_books',['books'=>$books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.book_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    // $validatedData = $request->validate([
    //     'title' => 'required',
    //     'authors[]' => 'required',
    //     'categories[]' => 'required',
    //     'stock' => 'required',
    //     'isbn' => 'required',
    //     'issn' => 'required',
    //     'pub_year' => 'required',
    //     'publisher' => 'required',
    //     'language' => 'required',
    //     'properties' => 'required',
    //     'description' => 'required',
    //     'cover_photo' => 'required'
    // ]);

     
     $userid = \Auth::user()->id;
     $book = new Book;
     

     $book->title = request('title');
     $book->pub_year = request('pub_year');
     $book->description = request('description');
     $book->properties = request('properties');
     $book->stock = request('stock');
     $book->cover_path = request('cover_photo');
     $book->publisher_id = request('publisher');
     $book->language_id = request('language');
     $book->created_by = $userid;
     $book->save();

     //AUTHORS
     $authors = request('authors');
     
     
     
      foreach ($authors as $auth) {

          $author = Author::find($auth);
          $author->books()->attach($book->id);
          $author->save();

     }

     //CATEGORIES
     $categories = request('categories');
     

      foreach ($categories as $cat) {

          $category = Category::find($cat);
          $category->books()->attach($book->id);
          $category->save();
          
     }



    //ISBN
     $isbn = new Isbn;

     $isbn->isbn = request('isbn');
     $isbn->book_id = $book->id;
     $isbn->save();




     

     if($book->save() && $author->save() && $category->save() && $isbn->save()){
        return redirect('/book');
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
        $book = Book::find($id);
        if($book != null){
        return View::make('book.book',['book'=>$book]);
    }else{
         abort(404);
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        

        return view('admin.book_edit',['book'=>$book])->render();
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

        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title'       => 'required|min:6',

        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('book/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::all());
        } else {
            // store
            $nerd = Book::find($id);
            $nerd->title       = request('title');
            $nerd->stock       = request('stock');
            $nerd->pub_year    = request('pub_year');
            $nerd->properties  = request('properties');
            $nerd->description = request('description');
            
            //Isbn insert
            $isbn = new Isbn;

            $isbn->isbn = request('isbn');
            $isbn->book_id = $nerd->id;
            $isbn->save();


            $nerd->save();
            

            //Removes attached authors to books
            $nerd->authors()->detach();
            
            //Inserts New selected authors to books
            $newAuthor = request('authors');
            //dd($newAuthor);
            if(isset($newAuthor)){
            foreach ($newAuthor  as $Authors) {

                $Author = Author::find($Authors);
                $Author->books()->attach($nerd->id);
                $Author->save();
                
            }
            }




            //Removes attached category to books
            $nerd->categories()->detach();
            
            //Inserts New selected category to books
            $categories = request('categories');
            
            if(isset($categories)){
            foreach ($categories as $category) {

                $newCategory = Category::find($category);
                $newCategory->books()->attach($nerd->id);
                $newCategory->save();
                
            }
            }



            // redirect
            Session::flash('message', 'Successfully updated nerd!');
            return Redirect::to('/book');
        }
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
