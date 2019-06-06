@extends('admin.layouts.list')
@section('contents')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-body ">

                    </div>
                    <div class="layui-card-header">
                        <button class="layui-btn" onclick="xadmin.open('添加管理员','{{ url('backstage/admin/create') }}',600,400)"><i class="layui-icon"></i>添加</button>
                    </div>
                    <div class="layui-card-body ">
                        <table class="layui-table layui-form" lay-size="lg">
                            <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" name=""  lay-skin="primary" lay-filter="allChoose">
                                </th>
                                <th>ID</th>
                                <th>用户名</th>
                                <th>邮箱</th>
                                <th>创建时间</th>
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
                                    <td>{{ $v['email'] }}</td>
                                    <td>{{ $v['created_at'] }}</td>
                                    <td class="td-manage">
                                        @if(!isset($v['deleted_at']))
                                            <a class="layui-btn layui-btn-normal layui-btn-xs" onclick="xadmin.open('编辑','{{ url('backstage/admin/edit',['id'=>$v['id']]) }}',600,400)" href="javascript:;">
                                                <i class="layui-icon">&#xe642;</i>编辑
                                            </a>
                                            <a class="layui-btn layui-btn-danger layui-btn-xs" onclick="delOne(this,'{{ $v['id'] }}','{{ url('backstage/admin/del') }}')" href="javascript:;">
                                                <i class="layui-icon">&#xe640;</i>加入回收站
                                            </a>
                                        @else
                                            <a class="layui-btn llayui-bg-orange layui-btn-xs" onclick="restoreOne(this,'{{ $v['id'] }}','{{ url('backstage/admin/restore') }}')" href="javascript:;">
                                                <i class="layui-icon">&#xe640;</i>移除回收站
                                            </a>
                                        @endif

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


