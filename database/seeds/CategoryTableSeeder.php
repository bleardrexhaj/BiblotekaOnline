l<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\Category::class, 10)->create()->each(function($c){

            //Per gjdo kategori ruaj 10 nenkategori tjera
            $c->childCategories()->saveMany(factory(App\Category::class,10)->create());

        });
    }
}
