@extends('admin.layouts.list')
@section('contents')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-body ">

                    </div>
                    <div class="layui-card-header">
                        <button class="layui-btn" onclick="xadmin.open('添加管理员','{{ url('backstage/role/create') }}',600,400)"><i class="layui-icon"></i>添加</button>
                    </div>
                    <div class="layui-card-body ">
                        <table class="layui-table layui-form" lay-size="lg">
                            <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" name=""  lay-skin="primary" lay-filter="allChoose">
                                </th>
                                <th>ID</th>
                                <th>角色名称</th>
                                <th>说明</th>
                                <th>操作</th></tr>
                            </thead>
                            <tbody>
                            @foreach($list as $k=>$v)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="check[]"  lay-skin="primary">
                                    </td>
                                    <td>{{ $v['id'] }}</td>
                                    <td>{{ $v['name'] }}</td>
                                    <td>{{ $v['descript'] }}</td>
                                    <td class="td-manage">
                                        <a class="layui-btn layui-btn-normal layui-btn-xs" onclick="xadmin.open('编辑','{{ url('backstage/role/edit',['id'=>$v['id']]) }}',600,400)" href="javascript:;">
                                            <i class="layui-icon">&#xe642;</i>编辑
                                        </a>
                                        <a class="layui-btn layui-btn-danger layui-btn-xs" onclick="del(this,'{{ $v['id'] }}','{{ url('backstage/role/del') }}')" href="javascript:;">
                                            <i class="layui-icon">&#xe640;</i>删除
                                        </a>

                                        <a title="授权" class="layui-btn layui-btn-primary layui-btn-xs" onclick="xadmin.open('授权','{{ url('backstage/permission/index',['id'=>$v['id']]) }}',600,400)" href="javascript:;">
                                            <i class="layui-icon">&#xe653;</i>授权
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="layui-card-body">
                        <div class="page">
                            {{ $list->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


