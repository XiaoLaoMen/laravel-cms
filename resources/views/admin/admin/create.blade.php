@extends('admin.layouts.operate')
@section('contents')
    <form class="layui-form" method="post" action="{{ url('backstage/admin/store') }}">
        @csrf
        <div class="layui-form-item">
            <label for="name" class="layui-form-label">
                <span class="x-red">*</span>昵称</label>
            <div class="layui-input-inline">
                <input type="text" name="name" value="{{ old('name') }}" placeholder="请输入昵称" autocomplete="off" class="layui-input" lay-verify="name">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>昵称最长为20个字符
            </div>
        </div>

        <div class="layui-form-item">
            <label for="email" class="layui-form-label">
                <span class="x-red">*</span>邮箱</label>
            <div class="layui-input-inline">
                <input type="text" name="email" value="{{ old('email') }}" lay-verify="email" placeholder="xxx@xx.com"  autocomplete="off" class="layui-input"></div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>后台登录使用.必须是唯一的.
            </div>
        </div>

        <div class="layui-form-item">
            <label for="password" class="layui-form-label">
                <span class="x-red">*</span>密码</label>
            <div class="layui-input-inline">
                <input type="password" id="password" placeholder="6-16个长度的密码" name="password" lay-verify="password" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>密码必须包含大写字母.小写字母和数字,且长度6-16位
            </div>
        </div>
        <div class="layui-form-item">
            <label for="password_confirmation" class="layui-form-label">
                <span class="x-red">*</span>确认密码</label>
            <div class="layui-input-inline">
                <input type="password" placeholder="6-16个长度的密码" id="password_confirmation" name="password_confirmation" lay-verify="password_confirmation" autocomplete="off" class="layui-input"></div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>确认密码.
            </div>
        </div>

        <div class="layui-form-item">
            <label for="role_id" class="layui-form-label">
                <span class="x-red">*</span>角色</label>
            <div class="layui-input-block">
                <select name="role_id" lay-filter="role_id" xm-select="role_id" xm-select-direction="down">
                    @foreach($roleList as $k=>$v)
                        <option value="{{ $v['id'] }}">{{ $v['name'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label"></label>
            <button class="layui-btn" lay-filter="add" lay-submit="">增加</button></div>
    </form>
@endsection
@section('footerScripts')
    <script>
        layui.use(['form', 'layer'],
            function() {
                $ = layui.jquery;
                var form = layui.form,
                    layer = layui.layer;

                //自定义验证规则
                form.verify({
                    name: function(value) {
                        if (value.length < 1) {
                            return '客官,昵称不能为空呢';
                        }
                    },
                    email:[/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/, "邮箱格式不正确"],
                    password: [/^.*(?=.{6,16})(?=.*\d)(?=.*[A-Z])(?=.*[a-z]).*$/, '密码必须包含大写字母.小写字母和数字,且长度6-16位'],
                    password_confirmation: function(value) {
                        if ($('#password').val() != $('#password_confirmation').val()) {
                            return '两次密码不一致';
                        }
                    }
                });

                var formSelects = layui.formSelects;
            });</script>
@endsection