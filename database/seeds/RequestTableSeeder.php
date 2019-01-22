<?php

use Illuminate\Database\Seeder;

class RequestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = App\Book::all();
        $users = App\User::all();
        factory(App\Request::class, 30)
            ->create();
    }
}
