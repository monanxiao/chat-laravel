<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChatIdentifyToChatInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chat_infos', function (Blueprint $table) {
            $table->string('chat_identify')->index()->comment(' A + B 聊天标识');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chat_infos', function (Blueprint $table) {
            //
            $table->dropcolumn('chat_identify');
        });
    }
}
