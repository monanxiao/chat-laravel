<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriendsTable extends Migration
{
    /**
     * Run the migrations.
     * 好友表
     * @return void
     */
    public function up()
    {
        Schema::create('friends', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index()->comment('本人ID');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('fuser_id')->index()->comment('好友ID');
            $table->foreign('fuser_id')->references('id')->on('users');
            $table->timestamp('fdate',0)->comment('添加日期');
            $table->boolean('Fstatus')->default(false)->comment('是否在线');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friends');
    }
}
