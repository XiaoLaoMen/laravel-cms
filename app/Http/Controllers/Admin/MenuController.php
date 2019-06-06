<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\MenuPost;
use App\Model\Admin\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends AdminBaseController
{
    public function index(Menu $menu)
	{
		$list = getTree($menu->getAll());
		return view('admin.menu.index',compact('list'));
	}

	public function create(Menu $menu)
	{
		$list = getTree($menu->getAll());
		return view('admin.menu.create',compact('list'));
	}

	public function store(MenuPost $request,Menu $menu)
	{
		$data = $request->except(['s','password_confirmation','_token']);
		if(isset($data['status'])){
            $data['status']=0;
        }else{
            $data['status']=1;
        }
		$menu->add($data);
		return back()->with('success', returnMsg('success'));
	}

	public function edit(Request $request,Menu $menu)
	{
		$where[]=['id','=',$request->id];
		$info = $menu->oneInfo($where);
        $list = getTree($menu->getAll());
		return view('admin.menu.edit',compact('info','list'));
	}

	public function update(MenuPost $request,Menu $menu)
	{
		$data = $request->except(['s','password_confirmation','_token']);
        if(isset($data['status'])){
            $data['status']=0;
        }else{
            $data['status']=1;
        }
		$where[]=['id','=',$request->id];
        $menu->updateOne($where,$data);
		return back()->with('success', returnMsg('success'));
	}

	public function del(MenuPost $request,Menu $menu)
	{
		$where[]=['id','=',$request->input('id')];
        $menu->del($where);
		return response()->json(returnData());
	}
}
