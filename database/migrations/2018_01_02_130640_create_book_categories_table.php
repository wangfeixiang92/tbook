<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('create_uid')->nullable()->comment("创建人id");
            $table->integer('update_uid')->nullable()->comment("修改人id");
            $table->dateTime('create_time')->nullable()->default(\DB::raw('CURRENT_TIMESTAMP'))->comment("创建时间");
            $table->dateTime('update_time')->nullable()->default(\DB::raw('CURRENT_TIMESTAMP'))->comment("修改时间");
            $table->integer('module_id')->comment('模块id');
            $table->string('cate_name',32)->comment('分类名称');
            $table->integer('parent_id')->default(0)->comment('父级id');
            $table->string('is_show')->comment('是否显示');
            $table->index('cate_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_categories');
    }
}
