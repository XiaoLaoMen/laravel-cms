<!doctype html>
<html  class="x-admin-sm">
<head>
    <meta charset="UTF-8">
    <title>后台登录-X-admin2.2</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="{{ Storage::url('css/font.css') }}">
    <link rel="stylesheet" href="{{ Storage::url('css/login.css') }}">
    <link rel="stylesheet" href="{{ Storage::url('css/xadmin.css') }}">
</head>
<body class="login-bg">

<div class="login layui-anim layui-anim-up">
    <div class="message">后台登陆系统</div>
    @if ($errors->any())
        <div class="jd_login_panle_input" style="padding: 0 26px; font-size: 13px; color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div id="darkbannerwrap"></div>
    <form method="post" class="layui-form" action="{{ url('backstage/login/login') }}">
        @csrf
        <input name="email" value="{{ old('login_name') }}" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
        <hr class="hr15">
        <input name="password" value="" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
        <hr class="hr15">
        <div id="slider"></div>
        <hr class="hr15">
        <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
        <hr class="hr20" >
    </form>
</div>
<script type="text/javascript" src="{{ Storage::url('js/3.2.1.jquery.min.js') }}"></script>
<script src="{{ Storage::url('lib/layui/layui.js') }}" charset="utf-8"></script>
<!--[if lt IE 9]>
<script src="{{ Storage::url('js/html5.min.js') }}"></script>
<script src="{{ Storage::url('js/1.4.2.1.4.2.respond.min.js') }}"></script>
<![endif]-->
<script>
    $(function  () {

        layui.config({
            base: "{{ Storage::url('lib/') }}"
        }).extend({
            sliderVerify:'sliderVerify/sliderVerify'
        }).use(['sliderVerify', 'jquery', 'form'], function() {
            var sliderVerify = layui.sliderVerify,
                form = layui.form;
            var slider = sliderVerify.render({
                elem: '#slider',
                onOk: function(){//当验证通过回调
                    layer.msg("滑块验证通过",{icon: 1});
                }
            });
            //监听提交
            form.on('submit(login)', function(data) {
                if(!slider.isOk()){
                    layer.msg(JSON.stringify(data.field));
                    return false;
                }
            });
        })
    })
</script>
<!-- 底部结束 -->

</body>
</html>