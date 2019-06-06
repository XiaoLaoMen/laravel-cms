@extends('admin.layouts.operate')
@section('contents')
    <form class="layui-form" method="post" action="{{ url('backstage/menu/update',['id'=>$info['id']]) }}">
        @csrf
        <div class="layui-form-item">
            <label for="name" class="layui-form-label">
                <span class="x-red">*</span>菜单名称</label>
            <div class="layui-input-inline">
                <input type="text" name="name" value="{{ $info['name'] }}" placeholder="请输入菜单名称" autocomplete="off" class="layui-input" lay-verify="name">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>菜单名称
            </div>
        </div>

        <div class="layui-form-item">
            <label for="name" class="layui-form-label">
                <span class="x-red">*</span>导航</label>
            <div class="layui-input-inline">
                <select name="pid" lay-filter="pid">
                    <option value="0">顶级导航</option>
                    @foreach($list as $k=>$v)
                        <option value="{{ $v['id'] }}" @if($v['id']==$info['pid']) selected="selected" @endif>{{ $v['name'] }}</option>
                        @if(count($v['child'] !='0'))
                            @foreach($v['child'] as $vv)
                                <option value="{{ $vv['id'] }}" @if($vv['id']==$info['pid']) selected="selected" @endif>----{{ $vv['name'] }}</option>
                            @endforeach
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="layui-form-item">
            <label for="icon" class="layui-form-label">
                <span class="x-red">*</span>icon</label>
            <div class="layui-input-inline">
                <input type="text" name="icon" value="{{ $info['icon'] }}" lay-verify="icon" placeholder="icon图标"  autocomplete="off" class="layui-input"></div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>icon图标
            </div>
        </div>

        <div class="layui-form-item">
            <label for="url" class="layui-form-label">
                <span class="x-red">*</span>地址</label>
            <div class="layui-input-inline">
                <input type="text" name="url" value="{{ $info['url'] }}" lay-verify="url" placeholder="模块/控制器/方法"  autocomplete="off" class="layui-input"></div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>模块/控制器/方法
            </div>
        </div>

        <div class="layui-form-item">
            <label for="sort" class="layui-form-label">
                <span class="x-red">*</span>排序</label>
            <div class="layui-input-inline">
                <input type="text" name="sort" value="{{ $info['sort'] }}" lay-verify="sort" placeholder="填写数字"  autocomplete="off" class="layui-input"></div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>只能填写数字
            </div>
        </div>

        <div class="layui-form-item">
            <label for="status" class="layui-form-label">
                <span class="x-red">*</span>是否显示</label>
            <div class="layui-input-inline">
                <input type="checkbox" name="status" lay-skin="switch" lay-text="ON|OFF" @if($info['status']==0) checked @endif>
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>后台导航是否显示
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
                            return '客官,导航名称不能为空呢';
                        }
                    },
                    icon: function(value) {
                        if (value.length < 1) {
                            return '客官,图标不能为空呢';
                        }
                    },
                    url: [/^[a-zA-Z]+\/[a-zA-Z]+\/[a-zA-Z]+$/, '模块类型不正确'],
                    sort: [/^[0-9]+$/, '排序只能是数字'],
                });
            });</script>
@endsection