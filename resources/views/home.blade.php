@extends('layouts.app')

@section('content')

        @include('layouts._nav_saidebar_left')
        @include('layouts._sidebar_border_end')
        @include('layouts._nav_rightbar')

        <div class="main px-xl-5 px-lg-4 px-3">

            <div class="chat-body">

                <div
                    class="chat d-flex justify-content-center align-items-center h-100 text-center py-xl-4 py-md-3 py-2">
                    <div class="container-xxl">
                        <div class="avatar lg avatar-bg me-auto ms-auto mb-5">
                            <img class="avatar lg rounded-circle border"
                                src="/web/images/user.png" alt="">
                            <span class="a-bg-1"></span>
                            <span class="a-bg-2"></span>
                        </div>
                        <h5 class="font-weight-bold">Hey, {{ Auth::user()->name }}</h5>
                        <p>请选择一个聊天开始发送消息.</p>
                    </div>
                </div>

            </div>

        </div>

@endsection
