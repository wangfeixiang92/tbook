<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('create_uid')->nullable()->comment("创建人id");
            $table->integer('update_uid')->nullable()->comment("修改人id");
            $table->dateTime('create_time')->nullable()->default(\DB::raw('CURRENT_TIMESTAMP'))->comment("创建时间");
            $table->dateTime('update_time')->nullable()->default(\DB::raw('CURRENT_TIMESTAMP'))->comment("修改时间");
            $table->string('name',64)->comment('模块名称');
            $table->string('is_show')->comment('是否前端显示');
            $table->index('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
}
