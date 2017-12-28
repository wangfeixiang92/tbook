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

@endsection