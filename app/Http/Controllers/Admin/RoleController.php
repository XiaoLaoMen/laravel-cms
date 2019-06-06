<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\RolePost;
use App\Model\Admin\Role;
use App\Model\Admin\RoleAdmin;
use Illuminate\Http\Request;

class RoleController extends AdminBaseController
{
    public function index(Role $role)
	{
		$list = $role->getListByPage();
		return view('admin.role.index',compact('list'));
	}

	public function create()
	{
		return view('admin.role.create');
	}

	public function store(RolePost $request,Role $role)
	{
		$data = $request->except(['s','password_confirmation','_token']);
		$data['descript'] = $data['descript'] ?? '';
		$role->add($data);
		return back()->with('success', returnMsg('success'));
	}

	public function edit(Request $request,Role $role)
	{
		$where[]=['id','=',$request->id];
		$list = $role->oneInfo($where);
		return view('admin.role.edit',compact('list'));
	}

	public function update(RolePost $request,Role $role)
	{
		$data = $request->except(['s','password_confirmation','_token']);
		$data['descript'] = $data['descript'] ?? '';
		$where[]=['id','=',$request->id];
		$role->updateOne($where,$data);
		return back()->with('success', returnMsg('success'));
	}

	public function del(RolePost $request, Role $role, RoleAdmin $roleUser)
	{
		$id = $request->input('id');
		//此角色是否有用户
		$userExistsWhere[]=['role_id','=',$id];
		$userExists = $roleUser->oneInfo($userExistsWhere);
		if(!$userExists){
			$where[]=$id;
			$role->del($where);
			return response()->json(returnData());
		}else{
			return response()->json(returnData('fail','此角色存在用户,修改用户后,在进行操作'));
		}

	}
}
