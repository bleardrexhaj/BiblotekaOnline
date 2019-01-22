<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

//use Illuminate\Support\Collection;

class Category extends Model
{


    public function childCategories()
    {
        return $this->hasMany('App\Category','parent_id');
    }


    public function parentCategory()
    {
        return $this->belongsTo('App\Category','parent_id');
    }


    public function books(){
        return $this->belongsToMany('App\Book');
    }

    public function getNumberOfBooksAttribute(){
        return $this->books()->count();
    }

    public function getNumberOfSubcategoriesAttribute(){
        return $this->childCategories()->count();
    }

    /**
     * @return Collection
     * Returns all upper categories, this not included.
     * Example: Category
     *             ->Subcategory1
     *                  ->Subcategory2
     *                      ->Subcategory3
     *                           ->this.
     * It would return: Category
     *             ->Subcategory1
     *                  ->Subcategory2
     *                      ->Subcategory3
     */
    public function getUpperTrailAttribute()
    {
        $current = $this;
        $categories = array();
        while($current->parentCategory !== null){

            $current = $current->parentCategory;
            $categories[] = $current;
        }
        return  Collection::make($categories)->reverse();
    }

    public function getSubBooksAttribute(){
        $books= array();
        $cats = $this->getAllChildCategoriesAttribute();
        foreach ($cats as $category){
            if($category->books()->count()>0) {
                foreach ($category->books() as $book) {
                    $books[] = $book;
                }
            }
        }
        return $cats;
        return \Illuminate\Database\Eloquent\Collection::make($books);
    }


    public function getAllChildCategoriesAttribute()
    {
        self::getSubCategories($this);
        return \Illuminate\Database\Eloquent\Collection::make(self::$categories);
    }

    private static $categories = array();
    private function getSubCategories($category){

        foreach ($category->childCategories as $subCategory){
            self::getSubCategories($subCategory);
        }
        self::$categories[] = $category;
    }




}
