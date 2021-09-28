<?php

namespace App\GatewayWorker;

/**
 * This file is part of workerman.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the MIT-LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author walkor<walkor@workerman.net>
 * @copyright walkor<walkor@workerman.net>
 * @link http://www.workerman.net/
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

/**
 * 用于检测业务代码死循环或者长时间阻塞等问题
 * 如果发现业务卡死，可以将下面declare打开（去掉//注释），并执行php start.php reload
 * 然后观察一段时间workerman.log看是否有process_timeout异常
 */
//declare(ticks=1);

use GatewayWorker\Lib\Gateway;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;

/**
 * 主逻辑
 * 主要是处理 onConnect onMessage onClose 三个方法
 * onConnect 和 onClose 如果不需要可以不用实现并删除
 */
class Events
{
    public static function onWorkerStart($businessWorker)
    {

        echo "BusinessWorker    Start\n";
    }

    /**
     * 当客户端连接时触发
     * 如果业务不需此回调可以删除onConnect
     *
     * @param int $client_id 连接id
     */
    public static function onConnect($client_id)
    {

        Log::info('上线了:' . $client_id);

        // 向当前client_id发送数据
        // Gateway::sendToClient($client_id, "Hello $client_id\r\n");

          // 向当前client_id发送数据
        Gateway::sendToClient($client_id, json_encode(array(
            'type'      => 'init',
            'client_id' => $client_id
        )));

        // 向所有人发送
        // Gateway::sendToAll(json_encode(["$client_id 上线了"]));
    }

    public static function onWebSocketConnect($client_id, $data)
    {
        Log::info('Socket:' . $client_id);
    }


   /**
    * 当客户端发来消息时触发
    * @param int $client_id 连接id
    * @param mixed $message 具体消息
    */
   public static function onMessage($client_id, $message)
   {

        // 向所有人发送
        Gateway::sendToAll("$client_id said $message\r\n");
   }

   /**
    * 当用户断开连接时触发
    * @param int $client_id 连接id
    */
   public static function onClose($client_id)
   {
       Log::info($client_id . '下线了');

       // 向所有人发送
    //    GateWay::sendToAll("$client_id logout\r\n");
   }
}
