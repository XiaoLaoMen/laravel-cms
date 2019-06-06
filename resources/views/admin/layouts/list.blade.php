<!doctype html>
<html class="x-admin-sm">
<head>
    <meta charset="UTF-8">
    <title>后台管理系统</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ Storage::url('css/font.css') }}">
    <link rel="stylesheet" href="{{ Storage::url('css/xadmin.css') }}">
    @section('topCss')

    @show
    <script src="{{ Storage::url('lib/layui/layui.js') }}" charset="utf-8"></script>
    <script type="text/javascript" src="{{ Storage::url('js/xadmin.js') }}"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
    <script src="{{ Storage::url('js/html5.min.js') }}"></script>
    <script src="{{ Storage::url('js/1.4.2.1.4.2.respond.min.js') }}"></script>
    <![endif]-->
</head>
<body>
<div class="x-nav">
          <span class="layui-breadcrumb">
            <a href="">首页</a>
            <a href="">演示</a>
            <a>
              <cite>导航元素</cite></a>
          </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
        <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
    <hr>


</div>
@section('contents')

@show
</body>
<script type="text/javascript" src="{{ Storage::url('js/other.js') }}"></script>
@section('footerScripts')

@show
</html>
