<?php

/**
 * 获取所有路由信息
 */
if(!function_exists('getRouteInfo')){
	function getRouteInfo($string)
	{
		$inFo  = request()->route()->getAction();
		return $inFo[$string];
//
	}
}

/**
 * 获取控制器和方法
 */
if(!function_exists('getAction')){
	function getActionAndMethod()
	{
		$actions = getRouteInfo('controller');
		list($class, $method) = explode('@', $actions);
		$class = substr(strrchr($class,'\\'),1);
		return ['controller' => $class, 'method' => $method];
	}
}

/**
 * 获取模块/控制器/方法
 */
if(!function_exists('getPathInfo')){
	function getPathInfo()
	{
		$inFo  = request()->route()->getAction();
		$actions = $inFo['controller'];
		list($class, $method) = explode('@', $actions);
		$class = substr( substr(strrchr($class,'\\'),1), 0, -10);
		$path = strtolower('backstage/'.$class.'/'.$method);
		return $path;
	}
}

/**
 * 返回数据
 */
if (! function_exists('returnData')) {
	function returnData($status = 'success', $msg = '操作成功', $data = [])
	{
		return array('status' => $status, 'msg' => $msg, 'data' => $data);
	}
}

/**
 * 返回消息
 */
if (! function_exists('returnMsg')) {
	function returnMsg($status = 'success',$msg='')
	{
	    if($msg!=''){
            $array = array(
                'success'=>$msg,
                'fail'=>$msg
            );
        }else{
            $array = array(
                'success'=>'操作成功',
                'fail'=>'操作失败'
            );
        }

		return $array[$status];
	}
}

/**
 * 无限极分类
 */
if (! function_exists('getTree')) {
	function getTree($cate, $name = 'child', $pid = 0)
	{
        $arr = array();
	    if(is_array($cate)){
            foreach ($cate as $v)
            {
                if ($v['pid'] == $pid)
                {
                    $v['child'] = getTree($cate, $name, $v['id']);
                    $arr[]    = $v;
                }
            }
        }
		return $arr;
	}
}

