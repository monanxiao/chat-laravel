<?php

namespace App\Listeners;

use App\Events\UserLoginEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use DB;

class UserLogin
{

    /**
     * 监听用户登录
     *
     * @param  UserLoginEvent  $event
     * @return void
     */
    public function handle(UserLoginEvent $event)
    {
        // 更新在线状态
        DB::table('users')->where('id',$event->user->id)->update(['isonlie' => true]);

    }
}
