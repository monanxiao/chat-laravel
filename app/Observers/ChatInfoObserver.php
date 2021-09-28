<?php

namespace App\Observers;

use App\Models\ChatInfo;
use Log;

class ChatInfoObserver
{
    // 新增时 增加 标识
    public function creating(ChatInfo $chatInfo)
    {
        $identify = md5($chatInfo->send_user_id + $chatInfo->to_user_id);// 先求和
        $chatInfo->chat_identify = $identify;// 唯一标识
    }

    /**
     * Handle the ChatInfo "created" event.
     *
     * @param  \App\Models\ChatInfo  $chatInfo
     * @return void
     */
    public function created(ChatInfo $chatInfo)
    {
        //
    }

    /**
     * Handle the ChatInfo "updated" event.
     *
     * @param  \App\Models\ChatInfo  $chatInfo
     * @return void
     */
    public function updated(ChatInfo $chatInfo)
    {
        //
    }

    /**
     * Handle the ChatInfo "deleted" event.
     *
     * @param  \App\Models\ChatInfo  $chatInfo
     * @return void
     */
    public function deleted(ChatInfo $chatInfo)
    {
        //
    }

    /**
     * Handle the ChatInfo "restored" event.
     *
     * @param  \App\Models\ChatInfo  $chatInfo
     * @return void
     */
    public function restored(ChatInfo $chatInfo)
    {
        //
    }

    /**
     * Handle the ChatInfo "force deleted" event.
     *
     * @param  \App\Models\ChatInfo  $chatInfo
     * @return void
     */
    public function forceDeleted(ChatInfo $chatInfo)
    {
        //
    }
}
