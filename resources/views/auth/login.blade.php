@extends('layouts.app')

@section('content')

<div class="authentication">
    <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center no-gutters min-vh-100">
            <div class="col-12 col-md-7 col-lg-5 col-xl-4 py-md-11">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">

                        <h3 class="text-center">登录</h3>

                        <p class="text-center mb-6">让它简单，但有意义</p>

                        <form class="mb-4 mt-5" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="input-group mb-2">
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="请输入您的邮箱地址" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group mb-4">
                                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror"  name="password" placeholder="请输入您的密码" required autocomplete="current-password" >
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <label class="c_checkbox">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="ms-2 todo_name">记住我</span>
                                    <span class="checkmark"></span>
                                </label>
                                <a class="link" href="{{ route('password.request') }}">忘记密码</a>
                            </div>

                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-lg btn-primary" >登录</button>
                            </div>
                        </form>

                        <p class="text-center mb-0">还没有账户？ <a class="link" href="{{ route('register') }}">注册</a></p>
                    </div>
                </div>
            </div>
            <div class="signin-img d-none d-lg-block text-center">
                <img src="/web/images/signin-img-cyan.svg" alt="登录背景图">
            </div>
        </div>
    </div>
</div>

@endsection
