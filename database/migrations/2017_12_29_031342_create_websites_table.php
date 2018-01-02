<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('create_uid')->nullable()->default(1)->comment("创建人id");
            $table->integer('update_uid')->nullable()->default(1)->comment("修改人id");
            $table->dateTime('create_time')->nullable()->default(\DB::raw('CURRENT_TIMESTAMP'))->comment("创建时间");
            $table->dateTime('update_time')->nullable()->default(\DB::raw('CURRENT_TIMESTAMP'))->comment("修改时间");
            $table->string('site_name',32)->comment("网站名称");
            $table->string('site_url',64)->nullable()->comment("网站url连接地址");
            $table->string('site_logo',256)->nullable()->comment("网站logo图片地址");
            $table->string('site_title',256)->nullable()->comment("网站标题");
            $table->string('site_keywords',256)->nullable()->comment("网站关键字");
            $table->string('site_desc',512)->nullable()->comment("网站描述");
            $table->string('site_record_no',128)->nullable()->comment("网站备案号");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('websites');
    }
}
