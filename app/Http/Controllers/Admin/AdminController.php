<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AdminPost;
use App\Model\Admin\Admin;
use App\Model\Admin\Role;
use App\Model\Admin\RoleAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends AdminBaseController
{
    public function index(Admin $admin)
	{
		$list = $admin->getListByPage();
		return view('admin.admin.index',compact('list'));
	}

	public function create(Role $role)
	{
	    $roleList = $role->all();
		return view('admin.admin.create',compact('roleList'));
	}

	public function store(AdminPost $request,Admin $admin)
	{
		$data = $request->except(['s','password_confirmation','_token']);
		$roleId = explode(',',$data['role_id']);
		unset($data['role_id']);
		$data['password'] = Hash::make($data['password']);
		$result = $admin->addAdminAndRole($data,$roleId);
		if($result==true){
            return back()->with('success', returnMsg('success'));
        }
        return back()->with('fail', returnMsg('fail','添加失败,请重新添加'));
	}

	public function edit(Request $request,Admin $admin,Role $role,RoleAdmin $roleAdmin)
	{
		$where[]=['id','=',$request->id];
		$list = $admin->oneInfo($where);
        $roleList = $role->all();
        $roleAdminWhere[] = ['admin_id','=',$request->id];
        $roleAdminList = $roleAdmin->getAll($roleAdminWhere)->toArray();
        $roles = '';
        foreach ($roleAdminList as $v)
        {
            if($roles == ''){
                $roles .=$v['role_id'];
            }else{
                $roles .=','.$v['role_id'];
            }
        }
		return view('admin.admin.edit',compact('list','roleList','roles'));
	}

	public function update(AdminPost $request,Admin $admin,Validator $validator)
	{
		$data = $request->except(['s','_token']);
		$password = $data['password'] ?? '';
		$password_confirmation = $data['password_confirmation'] ?? '';
		//密码字段验证
        if($password == $password_confirmation && $password != ''){
            $reg = '/(?=.*[a-z])(?=.*[A-Z])(?=.*\d){6,16}/';
            if(!preg_match($reg,$password)){
                return back()->withErrors('密码格式不正确');
            }
            $data['password'] = Hash::make($data['password']);
        }else{
            unset($data['password']);
            unset($data['password_confirmation']);
        }
        $roleId = explode(',',$data['role_id']);
        unset($data['role_id']);
		$where[]=['id','=',$request->id];
        $result = $admin->updateAdminAndRole($request->id,$data,$roleId);
        if($result==true){
            return back()->with('success', returnMsg('success'));
        }
        return back()->with('fail', returnMsg('fail','修改失败,请重新修改'));
	}

	public function del(AdminPost $request,Admin $admin)
	{
		$where[]=['id','=',$request->input('id')];
		$admin->del($where);
		return response()->json(returnData());
	}

	public function restore(AdminPost $request,Admin $admin)
	{
		$where[]=['id','=',$request->input('id')];
		$admin->restoreOne($where);
		return response()->json(returnData());
	}
}
