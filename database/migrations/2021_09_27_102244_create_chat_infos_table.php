<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatInfosTable extends Migration
{
    /**
     * Run the migrations.
     * 聊天记录 + 用户 中间表
     * @return void
     */
    public function up()
    {
        Schema::create('chat_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('send_user_id')->index()->comment('发送者ID');
            $table->foreign('send_user_id')->references('id')->on('users');
            $table->unsignedBigInteger('to_user_id')->index()->comment('接收者ID');
            $table->foreign('to_user_id')->references('id')->on('users');
            $table->timestamp('cdate',0)->index()->comment('发送日期');
            $table->unsignedBigInteger('text_id')->index()->comment('聊天记录ID');
            $table->foreign('text_id')->references('id')->on('texts');
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
        Schema::dropIfExists('chat_infos');
    }
}
