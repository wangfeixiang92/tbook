<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('create_uid')->nullable()->comment("创建人id");
            $table->integer('update_uid')->nullable()->comment("修改人id");
            $table->dateTime('create_time')->nullable()->default(\DB::raw('CURRENT_TIMESTAMP'))->comment("创建时间");
            $table->dateTime('update_time')->nullable()->default(\DB::raw('CURRENT_TIMESTAMP'))->comment("修改时间");
            $table->string('tag_name',64)->comment('标签名称');
            $table->string('is_show',4)->comment('是否显示');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_tags');
    }
}
