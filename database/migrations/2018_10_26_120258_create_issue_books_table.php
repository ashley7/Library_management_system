<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssueBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issue_books', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('book_user_id')->unsigned();
            $table->integer('book_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('status',1)->default(0);
            $table->string('date_issued',20);

            $table->foreign('book_user_id')->references('id')->on('book_users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('issue_books');
    }
}
