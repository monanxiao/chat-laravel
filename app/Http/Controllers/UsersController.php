<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Handler\WorkerHelper;
use Cache;

class UsersController extends Controller
{

    // 用户首页
    public function index(Request $request, WorkerHelper $workerhelper)
    {
        // 所有在线 ClientId 用户
        // $users = $workerhelper->AllClientId();
        $users = [];

        $users = Cache::get('Uid_ClientId_1');

        dd($users);

        return view('users.home', compact('users'));
    }
}
