<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\MenuService;
class Menu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    	//不同角色获取不同菜单列表
        $menus = MenuService::getAllMenu();
        $menuList = getTree($menus);
		//当前角色是否可以访问此路由
		$allUlr = MenuService::getUserUrl();
		$arr = array(
			'backstage/index/index',
			'backstage/index/base',
			'backstage/login/showloginform',
			'backstage/login/login',
			'backstage/login/logout',
			'backstage/skip/index',
		);
		foreach ($allUlr as $v)
		{
			$arr[] = $v['url'];
		}

		$currentUrl = getPathInfo();
		if(!in_array($currentUrl,$arr)){
			return redirect('backstage/skip/index');
		}

		view()->share('menuList',$menuList);
        return $next($request);
    }
}
