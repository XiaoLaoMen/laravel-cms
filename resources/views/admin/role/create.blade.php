@extends('admin.layouts.operate')
@section('contents')
    <form class="layui-form" method="post" action="{{ url('backstage/role/store') }}">
        @csrf
        <div class="layui-form-item">
            <label for="name" class="layui-form-label">
                <span class="x-red">*</span>角色名称</label>
            <div class="layui-input-inline">
                <input type="text" name="name" value="{{ old('name') }}" placeholder="请输入角色名称" autocomplete="off" class="layui-input" lay-verify="name">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>角色名称最长为20个字符
            </div>
        </div>

        <div class="layui-form-item">
            <label for="descript" class="layui-form-label">描述</label>

            <div class="layui-input-inline">
                <textarea placeholder="请输入描述内容" class="layui-textarea" name="descript">{{ old('descript') }}</textarea>
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
                            return '客官,角色名称不能为空呢';
                        }
                    },
                });
            });</script>
@endsection