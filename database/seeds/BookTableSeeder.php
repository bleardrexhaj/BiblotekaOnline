<?php

use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = App\Author::all();
        $subcategories = App\Category::all();


        $tags = App\Tag::all();
        factory(App\Book::class, 100)
            ->create()
            ->each(function($b) use ($tags, $subcategories, $authors) {
                if(rand(0,1)===0){
                    $b->authors()->sync($authors[rand(0,count($authors)-1)]);
                }
                else{
                    $b->authors()->sync($authors[rand(0,count($authors)-1)]);
                    $b->authors()->sync($authors[rand(0,count($authors)-1)]);
                }


                if(rand(0,1)===0){
                    $b->categories()->sync($subcategories[rand(0,count($subcategories)-1)]);
                }
                else{
                    $b->categories()->sync($subcategories[rand(0,count($subcategories)-1)]);
                    $b->categories()->sync($subcategories[rand(0,count($subcategories)-1)]);
                }

                if(rand(0,1)===0){
                    $b->tags()->sync($tags[rand(0,count($tags)-1)]);
                }
                else{
                    $b->tags()->sync($tags[rand(0,count($tags)-1)]);
                    $b->tags()->sync($tags[rand(0,count($tags)-1)]);
                }





            });
        
    }
}
