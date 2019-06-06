<!doctype html>
<html class="x-admin-sm">
<head>
    <meta charset="UTF-8">
    <title>后台管理系统</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="{{ Storage::url('css/font.css') }}">
    <link rel="stylesheet" href="{{ Storage::url('css/xadmin.css') }}">
    <link rel="stylesheet" href="{{ Storage::url('css/theme4.css') }}">
    <script src="{{ Storage::url('lib/layui/layui.js') }}" charset="utf-8"></script>
    <script type="text/javascript" src="{{ Storage::url('js/xadmin.js') }}"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
    <script src="{{ Storage::url('js/html5.min.js') }}"></script>
    <script src="{{ Storage::url('js/1.4.2.1.4.2.respond.min.js') }}"></script>
    <![endif]-->
    <script>
        // 是否开启刷新记忆tab功能
        // var is_remember = false;
    </script>

</head>
<body>
<!-- 顶部开始 -->
<div class="container">
    <div class="logo">
        <a href="{{ url('backstage/index/index') }}">后台管理</a></div>
    <div class="left_open">
        <a><i title="展开左侧栏" class="iconfont">&#xe699;</i></a>
    </div>
    <ul class="layui-nav right" lay-filter="">
        <li class="layui-nav-item">
            <a href="javascript:;">{{ request()->user()->name }}</a>
            <dl class="layui-nav-child">
                <!-- 二级菜单 -->
                <dd>
                    <a onclick="xadmin.open('个人信息','',600,400)">个人信息</a>
                </dd>
                <dd>
                    <a href="{{ url('backstage/login/logout') }}">退出</a>
                </dd>
            </dl>
        </li>
        <li class="layui-nav-item to-index">
            <a href="/">前台首页</a></li>
    </ul>
</div>
<!-- 顶部结束 -->
<!-- 左侧菜单开始 -->
<div class="left-nav">
    <div id="side-nav">
        <ul id="nav">
            @foreach($menuList as $v)
                <li>
                    <a href="javascript:;">
                        <i class="iconfont left-nav-li" lay-tips="{{ $v['name'] }}">
                            {!! $v['icon'] !!}
                        </i>
                        <cite>{{ $v['name'] }}</cite>
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>

                    @if(count($v['child']) != 0)
                        <ul class="sub-menu">
                            @foreach($v['child'] as $vv)
                                <li>
                                    <a onclick="xadmin.add_tab('{{ $vv['name'] }}','{{ url($vv['url']) }}')">
                                        <i class="iconfont">&#xe6a7;</i>
                                        <cite>{{ $vv['name'] }}</cite>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>
<!-- 左侧菜单结束 -->
<!-- 主体开始 -->
<div class="page-content">
    <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
        <ul class="layui-tab-title">
            <li class="home">
                <i class="layui-icon">&#xe68e;</i>我的桌面</li></ul>
        <div class="layui-unselect layui-form-select layui-form-selected" id="tab_right">
            <dl>
                <dd data-type="this">关闭当前</dd>
                <dd data-type="other">关闭其它</dd>
                <dd data-type="all">关闭全部</dd>
            </dl>
        </div>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                @section('content')
                    <iframe src='' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
                @show
            </div>
        </div>
        <div id="tab_show"></div>
    </div>
</div>
<div class="page-content-bg"></div>
<style id="theme_style"></style>
<!-- 主体结束 -->
</body>
</html>