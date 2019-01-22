<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.categories',['categories'=>$categories]);
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
        $category = new Category;

        $a = request('parent_id');
        if($a == '-2'){
            $category->parent_id = null;
        }else{
        $category->parent_id = $a;
        }
        $category->udc_code = request('udc_code');
        $category->name = request('name');
        $category->description = request('info');
        $category->created_by = \Auth::user()->id;
        $category->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $category = Category::find($id);
        if($category != null){
        return view('category.category',['category'=>$category]);
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
        $Category = Category::find($id);

        return view('admin.categorymanage.category_update',['Category'=>$Category]);
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
        $rules = array(
            'udc_code'       => 'required|max:6',
            'name'  =>'required|min:3',
            'description' =>'required|min:6|max:600'

        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('category/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::all());
        } else {
            // store
            $nerd = Category::find($id);
            $nerd->udc_code    = request('udc_code');
            $nerd->name        = request('name');
            $nerd->description = request('description');
            $pid = request('parent_id');
            if($pid == -1){
                $nerd->parent_id   = null;
            }else{
            $nerd->parent_id = $pid;
            }

            $nerd->save();
            return redirect('category/search');
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $id = request('button1');

        $Category = Category::find($id);
        $Category->books()->detach();
        $Category->childCategories()->delete();
        
        if($Category != null){
        $Category->delete();
        }


        return redirect()->back();
    
    }
    public function search()
    {
        $categories = Category::all()->reverse();
        return view('admin.categorymanage.category_search',['categories'=>$categories]);
    }
    public function add()
    {
        return view('admin.categorymanage.category_add');
    }
    public function delete()
    {
        if(Auth::User()){
        $categories = Category::all()->reverse();
        return view('admin.categorymanage.category_delete',['categories'=>$categories]);
        }else{
            return redirect('login');
        }
    }
    public function updateview()
    {
        return view('admin.categorymanage.category_update');
    }
}
