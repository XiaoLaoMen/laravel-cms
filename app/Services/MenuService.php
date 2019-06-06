<?php

namespace App\Services;

use App\Model\Admin\Menu;
use App\Model\Admin\RolePermission;
use Illuminate\Support\Facades\Auth;
use App\Model\Admin\RoleAdmin;
class MenuService
{

    /**
     * Notes:获取菜单
     * User: 你猜呢
     * Date: 2019/5/25
     * Time: 15:16
     * @return mixed
     */
    public static function getAllMenu()
    {
          $id = Auth::id();
          if(1==$id){
              //超级用户有所有权限
              return self::getAllUrl();
          }else{
              //按角色分配权限
                $roles = self::getUserAllRoles($id);
                $allPermission = self::getRoleHasPermission($roles);
                return self::getPermissionToUrl($allPermission);
          }
    }

    /**
     * Notes:获取所有权限
     * User: 你猜呢
     * Date: 2019/5/24
     * Time: 12:55
     * @return mixed
     */
    protected static function getAllUrl($status=false)
    {
        $menu = new Menu();
        if(!$status){
			$where[] = ['status','=','0'];
		}else{
			$where=array();
		}
        return $menu->where($where)->orderBy('sort','desc')->get()->toArray();
    }

    /**
     * Notes:获取用户的角色
     * User: 你猜呢
     * Date: 2019/5/25
     * Time: 14:54
     * @param $id
     * @return mixed
     */
    protected static function getUserAllRoles($id)
    {
        $rolesWhere[] = ['admin_id','=',$id];
        $roleAdmin = new RoleAdmin();
        $roleAdminArray = $roleAdmin->getAll($rolesWhere)->toArray();
        $arr = array();
        foreach ($roleAdminArray as $v){
            $arr[] = $v['role_id'];
        }
        return $arr;
    }

    /**
     * Notes:角色所具有的权限
     * User: 你猜呢
     * Date: 2019/5/25
     * Time: 15:06
     * @param $array
     * @return array
     */
    protected static function getRoleHasPermission($array)
    {
        $rolePermission = new RolePermission();
        $permissionList = $rolePermission->whereIn('role_id',$array)->get()->toArray();
        $permissionArr = array();
        foreach ($permissionList as $v)
        {
            if(!in_array($v['permission_id'],$permissionArr)){
                $permissionArr[] = $v['permission_id'];
            }
        }
        return $permissionArr;
    }

    /**
     * Notes:权限多对应的菜单选项
     * User: 你猜呢
     * Date: 2019/5/25
     * Time: 15:17
     * @param $array
	 * @return mixed
     */
    protected static function getPermissionToUrl($array,$status=false)
    {
        $menus = new Menu();
		if(!$status){
			$where[] = ['status','=','0'];
		}else{
			$where=array();
		}
        $menusList = $menus->where($where)->whereIn('id',$array)->orderBy('sort','desc')->get()->toArray();
        return $menusList;
    }

	/**
	 * 用户可以访问的所有路由
	 * @return mixed
	 */
	public static function getUserUrl()
	{
		$id = Auth::id();
		if(1==$id){
			//超级用户
			return self::getAllUrl(true);
		}else{
			//普通用户
			$roles = self::getUserAllRoles($id);
			$allPermission = self::getRoleHasPermission($roles);
			return self::getPermissionToUrl($allPermission,true);
		}

	}
}
