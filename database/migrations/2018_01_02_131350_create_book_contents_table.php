<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('create_uid')->nullable()->comment("创建人id");
            $table->integer('update_uid')->nullable()->comment("修改人id");
            $table->dateTime('create_time')->nullable()->default(\DB::raw('CURRENT_TIMESTAMP'))->comment("创建时间");
            $table->dateTime('update_time')->nullable()->default(\DB::raw('CURRENT_TIMESTAMP'))->comment("修改时间");
            $table->integer('user_id')->comment('用户id');//这个用作后台管理员的创建
            $table->integer('category_id')->comment('模块id');
            $table->string('title',32)->comment('标题');
            $table->string('images',128)->comment('图片');
            $table->integer('keywords')->nullable()->comment('关键字');
            $table->integer('desc')->nullable()->comment('描述');
            $table->string('is_show')->comment('是否显示');
            $table->integer('browse_num')->default(1)->comment('浏览数');
            $table->integer('collect_num')->default(1)->comment('收藏数');
            $table->integer('favorite_num')->default(1)->comment('喜爱数');
            $table->integer('download_num')->default(1)->comment('下载数');
            $table->dateTime('publish_time')->comment('发布时间');
            $table->index('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_contents');
    }
}
