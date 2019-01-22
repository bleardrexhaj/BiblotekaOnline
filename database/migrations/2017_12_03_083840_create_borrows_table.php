<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('borrow_start');
            $table->dateTime('borrow_end');
            $table->unsignedInteger('request_id');
            $table->unsignedInteger('loaned_by');
            $table->enum('status',['active','returned','not_returned']);
            $table->timestamps();
            $table->foreign('request_id')->references('id')->on('requests');
            $table->foreign('loaned_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrows');
    }
}
