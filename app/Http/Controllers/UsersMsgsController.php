<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Handler\WorkerHelper;
use App\Models\User;
use App\Models\Text;
use App\Models\ChatInfo;
use DB;
use Auth;
use Log;

class UsersMsgsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    // 聊天窗口
    public function msg(User $user)
    {
        // 当前用户的聊天记录
        $chat = Auth::user()->chatinfo($user->id);

        return view('chats.home', compact('user', 'chat'));
    }

    // 发送消息
    public function send(Request $request, WorkerHelper $workerhelper)
    {

        $res['send_user_id'] = $request->user()->id;// 发送人 ID
        $res['name'] = $request->user()->name;// 发送人姓名
        $res['to_uid'] = $request->to_uid;// 接收人 ID
        $res['content'] = $request->message;// 消息内容
        $res['cdate'] = date('Y-m-d H:i:s');// 发送时间
        $res['type'] = 'msg';// 消息类型

        // 开启事务
        DB::beginTransaction();

        try {

            // 插入聊天内容
            $text_id = Text::insertGetId([
                'content' => $res['content'], // 聊天内容
                'created_at' => date('Y-m-d H:i:s') // 创建时间
            ]);

            // 插入中间表记录
            ChatInfo::create([
                'send_user_id' => (int)$res['send_user_id'],// 发送者 ID
                'to_user_id' => (int)$res['to_uid'],// 接收人 ID
                'cdate' => $res['cdate'],// 发送时间
                'text_id' => (int)$text_id,// 聊天内容 ID
            ]);

            // 处理成功，提交事务
            DB::commit();

        } catch (\Throwable $th) {
            // 处理错误 回滚事务
            DB::rollBack();
        }

        $res['id'] = $text_id;// 消息 ID
        $workerhelper->SendUid($res['to_uid'], $res);// 发送 Uid 对方消息
        $res['type'] = 'send';// 消息类型
        $workerhelper->SendUid($res['send_user_id'], $res);// 发送 Uid 自己消息

        return response()->json(['message' => '成功！']);

    }

    // 绑定 clientId + uid
    public function bind(User $user, $clientId, WorkerHelper $workerhelper)
    {
        return $workerhelper->UCbind($user, $clientId);
    }
}
