<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/images/favicon.ico?v=2017" rel="icon" type="image/x-icon" />
@yield('meta')
<title>@yield('title')</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="keywords" content="@yield('keywords')" />
<meta name="description" content="@yield('description')" />
<script type="text/javascript" src="/js/home/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/js/home/holder.min.js"></script>
<!-- Styles -->
@yield('css')
<!-- Scripts -->
@yield('js')
<script>
    window.Laravel = '<?php echo json_encode(['csrfToken' => csrf_token()]); ?>'
</script>
</head>