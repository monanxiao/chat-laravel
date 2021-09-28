<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'send_user_id', 'to_user_id', 'cdate', 'text_id', 'chat_identify'
    ];


    // 拥有此聊天记录的发送用户
    public function suser()
    {
        return $this->hasOne(User::class, 'id', 'send_user_id');
    }

    // 拥有此聊天记录的接收用户
    public function tuser()
    {
        return $this->hasOne(User::class, 'id', 'to_user_id');
    }

    // 拥有的聊天内容
    public function chatinfos()
    {
        return $this->hasOne(Text::class, 'id', 'text_id');
    }
}
