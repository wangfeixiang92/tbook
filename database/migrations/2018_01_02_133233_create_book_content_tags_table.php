<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookContentTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_content_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('content_id')->comment('bookid');
            $table->integer('tag_id')->comment('标签id');
            $table->index(['content_id','tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_content_tags');
    }
}
