<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\PermissionPost;
use App\Model\Admin\Menu;
use App\Model\Admin\RolePermission;
use App\Model\Admin\Role;
use Illuminate\Http\Request;

class PermissionController extends AdminBaseController
{
    public function roleAuthorize(Request $request, Role $role, RolePermission $permissionRole, Menu $menu)
	{
		$id=$request->id;
		//角色名称
		$roleWhere[]=['id','=',$id];
		$roleList = $role->oneInfo($roleWhere);

		//角色具有的权限
		$permissionRoleWhere[] = ['role_id','=',$roleList['id']];
		$rolePermissionList = $permissionRole->getAll($permissionRoleWhere);
		$rolePermissionArr = array();
		foreach ($rolePermissionList as $v)
		{
		    $rolePermissionArr[]= $v['permission_id'];
        }
		//所有的权限
		$allPermission= getTree($menu->getAll());
		return view('admin.role.authorize',compact('roleList','rolePermissionArr','allPermission'));
	}

	public function roleAuthorizeUpdate(PermissionPost $request, RolePermission $permissionRole)
	{
		$data = $request->except(['s','_token']);
		$roleId = $request->id;
		$permissionRoleWhere[] = ['role_id','=',$roleId];
		$permissionRole->delList($permissionRoleWhere); //删除角色的所有权限
		//重新赋值
		$arr = array();
		foreach ($data['ids'] as $k=>$v){
			$arr[] = ['role_id'=>$roleId,'permission_id'=>$v];
		}
		$permissionRole->addMany($arr);
		return back()->with('success', returnMsg('success'));
	}
}
