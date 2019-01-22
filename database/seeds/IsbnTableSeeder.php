<?php

use Illuminate\Database\Seeder;

class IsbnTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Isbn::class, 100)->create();

    }
}
