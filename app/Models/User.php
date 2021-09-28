<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // 获取好友列表
    public function friends()
    {
        return $this->belongsToMany(User::class, Friends::class, 'user_id', 'fuser_id');
    }

    // 对话聊天记录
    public function chatinfo($tid)
    {
        $identify = md5($this->id + $tid);
        return ChatInfo::with('chatinfos', 'suser', 'tuser')
                    ->where('chat_identify', $identify)
                    ->get();
    }

    // 拥有此聊天记录的发送用户
    public function suser()
    {
        return $this->hasOne(ChatInfo::class, 'id', 'send_user_id');
    }

    // 拥有此聊天记录的接收用户
    public function tuser()
    {
        return $this->hasOne(ChatInfo::class, 'id', 'to_user_id');
    }
}
