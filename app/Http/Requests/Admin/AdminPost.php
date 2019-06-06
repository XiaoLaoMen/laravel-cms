<?php

namespace App\Http\Requests\Admin;

use App\Traits\PostTrait;
use Illuminate\Foundation\Http\FormRequest;

class AdminPost extends FormRequest
{
    use PostTrait;

	public function rules()
	{
		if($this->getCurrentMethod()=='store'){
			return [
				'name' => 'required|max:20',
				'email' => 'required|email',
				'role_id' => 'required|regex:/^[1-9]+(\,[0-9])*$/',
                'password' => 'required|confirmed|regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*\d){6,16}/',
                'password_confirmation' => 'required'
			];
		}elseif($this->getCurrentMethod()=='update'){
            $id = $this->route('id');
            $newId = $id ?? 0;
            return [
                'name' =>'required|max:20',
                'email' =>'required|email|unique:admins,email,'.$newId,
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
			'min' => ':attribute长度最短为:min',
			'max' => ':attribute长度最长为:max',
			'email' => ':attribute格式错误',
            'regex'=>':attribute错误',
		];
	}

	public function attributes()
	{
		return [
			'id'=>'参数',
			'article_sort' => '排序',
			'article_cate_name' => '分类名称',
			'role_id' => '角色',
		];
	}
}
