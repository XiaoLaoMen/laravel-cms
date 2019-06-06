<?php

namespace App\Http\Requests\Admin;

use App\Traits\PostTrait;
use Illuminate\Foundation\Http\FormRequest;

class MenuPost extends FormRequest
{
	use PostTrait;

	public function rules()
	{
		if($this->getCurrentMethod()=='store' || $this->getCurrentMethod()=='update'){
			return [
				'pid' =>'required|integer|min:0',
				'name' => 'required|max:120',
				'icon' =>'required',
				'url' =>'required|regex:/^[a-zA-Z]+\/[a-zA-Z]+\/[a-zA-Z]+$/',
				'sort' =>'required|integer|min:0',
			];
		}else{
			return [
				'id' =>'required|integer|min:1',
			];
		}
	}
	public function messages()
	{

		return [
			'required' => ':attribute必须存在',
			'integer' => ':attribute必须是数字',
			'min' => ':attribute错误',
			'max' => ':attribute长度最长为:max',
			'regex' => ':attribute格式错误',
		];
	}

	public function attributes()
	{
		return [
			'id'=>'参数',
			'pid' =>'导航',
			'name' => '菜单名称',
			'icon' =>'图标',
			'url' =>'地址',
			'sort' =>'排序',
		];
	}
}
