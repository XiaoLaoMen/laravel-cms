@extends('admin.layouts.list')
@section('contents')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-body ">

                    </div>
                    <div class="layui-card-header">
                        <button class="layui-btn" onclick="xadmin.open('添加菜单','{{ url('backstage/menu/create') }}',600,400)"><i class="layui-icon"></i>添加</button>
                    </div>
                    <div class="layui-card-body ">
                        <table class="layui-table layui-form">
                            <thead>
                            <tr>
                                <th width="20">
                                    <input type="checkbox" name="" lay-skin="primary">
                                </th>
                                <th width="70">ID</th>
                                <th>菜单名称</th>
                                <th>地址</th>
                                <th>排序</th>
                                <th>状态</th>
                                <th>操作</th>
                            </thead>
                            <tbody class="x-cate">
                            @foreach($list as $k=>$v)
                                <tr cate-id='{{$v['id']}}' fid='0' >
                                    <td>
                                        <input type="checkbox" name="" lay-skin="primary">
                                    </td>
                                    <td>{{$v['id']}}</td>
                                    <td>
                                        <i class="layui-icon x-show" status='true'>@if(count($v['child']) !=0) &#xe623; @endif</i>{{$v['name']}}
                                    </td>
                                    <td>{{$v['url']}}</td>
                                    <td>{{$v['sort']}}</td>
                                    <td>
                                        @if($v['status']==0)
                                            显示
                                        @else
                                            隐藏
                                        @endif
                                    </td>
                                    <td class="td-manage">
                                        <a class="layui-btn layui-btn-normal layui-btn-xs" onclick="xadmin.open('编辑','{{ url('backstage/menu/edit',['id'=>$v['id']]) }}',600,400)" href="javascript:;">
                                            <i class="layui-icon">&#xe642;</i>编辑
                                        </a>
                                        <a class="layui-btn layui-btn-danger layui-btn-xs" onclick="del(this,'{{ $v['id'] }}','{{ url('backstage/menu/del') }}')" href="javascript:;">
                                            <i class="layui-icon">&#xe640;</i>删除
                                        </a>
                                    </td>
                                </tr>
                                @if(count($v['child']) !=0)
                                    @foreach($v['child'] as $kk=>$vv)
                                        <tr cate-id='{{$vv['id']}}' fid='{{$v['id']}}' >
                                            <td>
                                                <input type="checkbox" name="" lay-skin="primary">
                                            </td>
                                            <td>{{ $vv['id'] }}</td>
                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="layui-icon x-show" status='true'>&#xe623;</i>{{$vv['name']}}
                                            </td>
                                            <td>
                                            {{ $vv['url'] }}
                                            <td>
                                                {{ $vv['sort'] }}
                                            </td>
                                            <td>
                                                @if($vv['status']==0)
                                                    显示
                                                @else
                                                    隐藏
                                                @endif
                                            </td>
                                            <td class="td-manage">
                                                <a class="layui-btn layui-btn-normal layui-btn-xs" onclick="xadmin.open('编辑','{{ url('backstage/menu/edit',['id'=>$vv['id']]) }}',600,400)" href="javascript:;">
                                                    <i class="layui-icon">&#xe642;</i>编辑
                                                </a>
                                                <a class="layui-btn layui-btn-danger layui-btn-xs" onclick="del(this,'{{ $vv['id'] }}','{{ url('backstage/menu/del') }}')" href="javascript:;">
                                                    <i class="layui-icon">&#xe640;</i>删除
                                                </a>
                                            </td>
                                        </tr>
                                        @if(count($vv['child']) !=0)
                                            @foreach($vv['child'] as $kkk=>$vvv)
                                                <tr cate-id='{{$vvv['id']}}' fid='{{$vv['id']}}' >
                                                    <td>
                                                        <input type="checkbox" name="" lay-skin="primary">
                                                    </td>
                                                    <td>{{ $vvv['id'] }}</td>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        ├{{$vvv['name']}}
                                                    </td>
                                                    <td>
                                                    {{ $vvv['url'] }}
                                                    <td>
                                                        {{ $vvv['sort'] }}
                                                    </td>
                                                    <td>
                                                        @if($vvv['status']==0)
                                                            显示
                                                        @else
                                                            隐藏
                                                        @endif
                                                    </td>
                                                    <td class="td-manage">
                                                        <a class="layui-btn layui-btn-normal layui-btn-xs" onclick="xadmin.open('编辑','{{ url('backstage/menu/edit',['id'=>$vvv['id']]) }}',600,400)" href="javascript:;">
                                                            <i class="layui-icon">&#xe642;</i>编辑
                                                        </a>
                                                        <a class="layui-btn layui-btn-danger layui-btn-xs" onclick="del(this,'{{ $vvv['id'] }}','{{ url('backstage/menu/del') }}')" href="javascript:;">
                                                            <i class="layui-icon">&#xe640;</i>删除
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif

                            @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{ Storage::url('js/jquery.min.js') }}"></script>
@section('footerScripts')
    <script>
        layui.use(['form','jquery'], function(){
            var form = layui.form;
        });
        // 分类展开收起的分类的逻辑
        $(function(){
            $("tbody.x-cate tr[fid!='0']").hide();
            // 栏目多级显示效果
            $('.x-show').click(function () {
                if($(this).attr('status')=='true'){
                    $(this).html('&#xe625;');
                    $(this).attr('status','false');
                    cateId = $(this).parents('tr').attr('cate-id');
                    $("tbody tr[fid="+cateId+"]").show();
                }else{
                    cateIds = [];
                    $(this).html('&#xe623;');
                    $(this).attr('status','true');
                    cateId = $(this).parents('tr').attr('cate-id');
                    getCateId(cateId);
                    for (var i in cateIds) {
                        $("tbody tr[cate-id="+cateIds[i]+"]").hide().find('.x-show').html('&#xe623;').attr('status','true');
                    }
                }
            })
        })
        var cateIds = [];
        function getCateId(cateId) {
            $("tbody tr[fid="+cateId+"]").each(function(index, el) {
                id = $(el).attr('cate-id');
                cateIds.push(id);
                getCateId(id);
            });
        }

    </script>
@endsection




