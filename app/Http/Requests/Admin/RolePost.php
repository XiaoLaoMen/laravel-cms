<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\PostTrait;

class RolePost extends FormRequest
{
	use PostTrait;

	public function rules()
	{
		if($this->getCurrentMethod()=='store' || $this->getCurrentMethod()=='update'){
			return [
				'name' => 'required|max:20',
				'descript' => 'max:120',
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
			'email' => ':attribute格式错误',
		];
	}

	public function attributes()
	{
		return [
			'id'=>'参数',
			'descript' => '描述',
			'name' => '角色名称',
		];
	}
}
