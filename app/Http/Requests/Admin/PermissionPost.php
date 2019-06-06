<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PermissionPost extends FormRequest
{
	public function rules()
	{
		return [
			'ids.*' =>'required|integer|min:1',
		];

	}

	public function messages()
	{
		return [
			'ids.*.required' => '参数错误,请重试',
			'ids.*.integer' => '参数错误,请重试',
			'ids.*.min' => '参数错误,请重试',
		];
	}
}
