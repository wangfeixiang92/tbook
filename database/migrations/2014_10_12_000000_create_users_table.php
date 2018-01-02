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
            $table->integer('create_uid')->nullable()->comment("创建人id");
            $table->integer('update_uid')->nullable()->comment("修改人id");
            $table->dateTime('create_time')->nullable()->default(\DB::raw('CURRENT_TIMESTAMP'))->comment("创建时间");
            $table->dateTime('update_time')->nullable()->default(\DB::raw('CURRENT_TIMESTAMP'))->comment("修改时间");
            $table->string('login_item',4)->default('E')->comment("默认登录方式:E:email;M:mobile..");
            $table->integer('user_level')->default(1)->nullable()->comment("用户等级");
            $table->string('username',64)->nullable()->unique()->comment("用户名");
            $table->string('email',64)->unique()->comment("邮件");
            $table->string('mobile',32)->nullable()->unique()->comment("手机");
            $table->string('sex',4)->nullable()->comment("性别");
            $table->string('password',64)->comment("密码");
            $table->string('status',4)->comment("状态");
            $table->date('reg_date')->nullable()->comment("注册时间");
            $table->ipAddress('reg_ip')->nullable()->comment("注册时间");
            $table->index('status');
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
