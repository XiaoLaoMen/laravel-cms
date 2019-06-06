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
    <link rel="stylesheet" href="{{ Storage::url('lib/formSelects/formSelects-v4.css') }}">
    @section('topCss')

    @show
    <script src="{{ Storage::url('lib/layui/layui.js') }}" charset="utf-8"></script>
    <script type="text/javascript" src="{{ Storage::url('js/xadmin.js') }}"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
    <script src="{{ Storage::url('js/html5.min.js') }}"></script>
    <script src="{{ Storage::url('js/1.4.2.1.4.2.respond.min.js') }}"></script>
    <![endif]-->
    <script type="text/javascript" src="{{ Storage::url('js/wangEditor.min.js') }}"></script>
    <script type="text/javascript" src="{{ Storage::url('lib/formSelects/formSelects-v4.min.js') }}"></script>
</head>
<body>
<div class="layui-fluid">
    <div class="layui-row">
        @if ($errors->any())
            <div class="jd_login_panle_input" style="padding: 0 26px; font-size: 13px; color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(Session::has('success'))
            <div class="jd_login_panle_input" style="padding: 0 26px; font-size: 13px; color: red;">
                <ul>
                    <li>{{Session::get('success')}}</li>
                </ul>
            </div>
        @endif
        @section('contents')

        @show
    </div>
</div>

</body>
@section('footerScripts')

@show
</html>
