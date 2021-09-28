<?php

namespace App\Handler;
use GatewayClient\Gateway;
use Cache;
use Log;

// worker 方法处理
class WorkerHelper{

    protected $gateway;

    // 构造方法
    public function __construct()
    {
        Gateway::$registerAddress = '192.168.10.10:12361';// 注册服务

        $this->gateway = new Gateway();// 实例化
    }

    /**
     * 绑定uid
     * @return mixed
     */
    public function UCbind($user, $clientId)
    {
        // 假设用户已经登录，用户uid和群组id在session中
        $res['type'] = 'bind';
        $res['time'] = date('H:i:s');
        $res['message'] = $user->name . '欢迎回来！';

        $cache_key = 'Uid_ClientId_' . $user->id;// keys
        $cache_expire_in_seconds = 1440 * 60; // 有效期

        // 写入缓存
        Cache::put($cache_key, $clientId, $cache_expire_in_seconds);

        // client_id 与 用户 id 绑定
        Gateway::bindUid($clientId, $user->id);
        Gateway::sendToUid($user->id, json_encode($res));

        return response()->json(['message' => '登录成功！']);
    }

    /**
     * Uid 发送消息
     * @return mixed
     * 发送人实例 $user
     * 接收者ID $to_uid
     * 数据包 $res
    */
    public function SendUid($to_uid, $res)
    {
        // 检测当前用户是否在线，假如不在线，就抛进 数据库 记录未读消息，待上线后推送
        if($this->isOnlineUid($to_uid)){

            return $this->gateway->sendToUid($to_uid, json_encode($res));
            return $this->gateway->sendToUid($to_uid, json_encode($res));

        }else{

            Log::info('假装此消息入库了');
        }

    }

    /**
     * 发送消息
     * @return mixed
     * 发送人实例 $user
     * 接收者ID $to_uid
     * 数据包 $res
     */
    public function sendClient($user, $to_uid, $res)
    {
        $res['type'] = 'send';
        $res['time'] = date('H:i:s');

        // 向任意 Clientid 的网站页面发送数据
        $this->gateway->sendToClient($uid, json_encode($res));
        $this->gateway->sendToClient($to_uid, json_encode($res));

        return response()->json($res);
    }

    // 检测 Client_id 用户是否在在线
    public function isOnlineClient($client_id)
    {
        return $this->gateway->isOnline($client_id);
    }

    // 检测 uid 用户是否在线
    public function isOnlineUid($uid)
    {
        return $this->gateway->isUidOnline($uid);
    }

    // 获取获取全局所有在线client_id列表
    public function AllClientId()
    {
        return $this->gateway->getAllClientIdList();
    }

    // 获取全局所有在线uid数量
    public function AllUidCount()
    {
        return $this->gateway->getAllUidCount();
    }
}
