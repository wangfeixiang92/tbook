@extends('layouts.app')
@section('title')千册资源网欢迎你！@endsection
@section('keywords')资源手册,类库下载,php教程，js插件，go教程，千册资源@endsection
@section('description')千册网是资源丰富的下载网站，我们致力于提供快速，高效的网络资源在线查看，下载服务@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/home/global.css"/>
    <link rel="stylesheet" type="text/css" href="/css/home/index.css"/>
    <style>
        .popup-mtp{bottom:0;}
        .set_width{
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            width:120px;
        }
    </style>
@endsection
@section('js')

@endsection

@section('content')
    @include('layouts.headertop')


    <div class="lg_dialog_mask remove" style="display: block;"></div>
    <div class="lg_wrap_login curr remove">
        <div class="lg_login">
            <p class="lg_wrap_colse"><a href="javascript:void(0);" class="close"><img src="/images/web/lg_close.jpg" width="25"/></a></p>
            <p class="lg_wrap_logo"><img src="/images/web/logo.png"></p>
            <p class="msg" style="color: red"></p>
            <p class="lg_wrap_text"><input type="text" name="mobile" placeholder="请输入手机号码"></p>
            <p class="lg_wrap_text"><input type="password" name="password" placeholder="请输入密码"></p>
            <p class="lg_wrap_lz"><a class="blue fl j_wj_btn" href="/forgetpwd.html?ReturnUrl='+window.location.href+'">忘记密码</a><a class="blue fr j_login_btn" href="/register.html?ReturnUrl='+window.location.href+'">注册账号</a></p>
            <p class="lg_wrap_btn"><input type="button" class="but_login_submit" value="登&#12288;录"></p>
            <p class="lg_wrap_dsf"><a class="lg_wrap_sina" href="/login/wxlogin?ReturnUrl='+window.location.href+'" target="_blank"></a><a class="lg_wrap_qq" href="/login/qqlogin?ReturnUrl='+window.location.href+'" target="_blank"></a></p>
        </div>
    </div>
@endsection