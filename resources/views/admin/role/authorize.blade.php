@extends('admin.layouts.operate')
@section('contents')
    <form action="{{ url('backstage/permission/update',['id'=>$roleList['id']]) }}" method="post" class="layui-form layui-form-pane">
        @csrf
        <div class="layui-form-item">
            <label for="name" class="layui-form-label">
                <span class="x-red">*</span>角色名
            </label>
            <div class="layui-input-inline">
                <input type="text" value="{{ $roleList['name'] }}" autocomplete="off" class="layui-input" disabled>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">
                拥有权限
            </label>
            <table  class="layui-table layui-input-block">
                <tbody>

                @foreach($allPermission as $k=>$v)

                    <tr>
                        <td>
                            <input type="checkbox" name="ids[]" lay-skin="primary" lay-filter="father" title="{{ $v['name'] }}" value="{{ $v['id'] }}" @if( in_array($v['id'],$rolePermissionArr)) checked @endif>
                        </td>
                        <td>
                            <div class="layui-input-block">
                                @if(count($v['child']) != 0)
                                    @foreach($v['child'] as $kk=>$vv)
                                        <input name="ids[]" lay-skin="primary" type="checkbox" value="{{ $vv['id'] }}" title="{{ $vv['name'] }}" @if( in_array($vv['id'],$rolePermissionArr)) checked @endif><br>
                                        @if(count($vv['child']) != 0)
                                            @foreach($vv['child'] as $kkk=>$vvv)
                                                <input name="ids[]" lay-skin="primary" type="checkbox" value="{{ $vvv['id'] }}" title="{{ $vvv['name'] }}" @if( in_array($vvv['id'],$rolePermissionArr)) checked @endif>
                                            @endforeach
                                            <br>
                                        @endif
                                    @endforeach
                                @endif

                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="layui-form-item">
            <button class="layui-btn" lay-submit="" lay-filter="add">确定</button>
        </div>
    </form>
@endsection

@section('footerScripts')
    <script>
        layui.use(['form', 'layer'],
            function() {
                $ = layui.jquery;
                var form = layui.form,
                    layer = layui.layer;

            });</script>
    <script type="text/javascript" src="{{ Storage::url('js/other.js') }}"></script>
@endsection