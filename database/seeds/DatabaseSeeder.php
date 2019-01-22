<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
//        Model::unguard();

        $this->call(UserTableSeeder::class);


        $this->call(LanguageTableSeeder::class);
        $this->call(AuthorTableSeeder::class);
        $this->call(CategoryTableSeeder::class);


        $this->call(PublisherTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(BookTableSeeder::class);
        $this->call(IsbnTableSeeder::class);
        $this->call(RequestTableSeeder::class);




//        Model::reguard();
    }
}
