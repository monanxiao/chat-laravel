@extends('layouts.app')

@section('content')

    @include('layouts._nav_saidebar_left')
    @include('layouts._sidebar_border_end')
    @include('layouts._nav_rightbar')

    <div class="main px-xl-5 px-lg-4 px-3">

        <div class="chat-body">

            @include('layouts._chat_header_userinfo') {{-- 聊天窗口 头部 用户信息 --}}

            @include('layouts._chat_content') {{-- 聊天记录 --}}

            @include('layouts._send') {{-- 消息发送 --}}

        </div>

    </div>

@endsection
