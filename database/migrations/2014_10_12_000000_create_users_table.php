<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pid')->unique()->nullable();
            $table->string('name');
            $table->date('dob');
            $table->string('address');
            $table->string('phone')->nullable();
            $table->string('email')->unique()->nullable();

            $table->unsignedInteger('parent_id')->nullable();

            $table->enum('user_type',['user','admin'])->default('user');
            $table->date('approved_at')->nullable();
            $table->unsignedInteger('approved_by')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();


            $table->foreign('approved_by')->references('id')->on('users');
            $table->foreign('parent_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
