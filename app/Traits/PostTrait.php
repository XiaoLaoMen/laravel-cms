<?php

namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
Trait PostTrait
{
    public function getCurrentMethod()
    {
        $actionAndMethod=getActionAndMethod();
        return $actionAndMethod['method'];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $user = Auth::user();
            $arr['msg'] = $validator->errors()->all();
            $arr['name'] =$user;
			Log::channel('request')->info('后台请求验证数据失败:',$arr);
        });
    }

    // 重写ajax请求验证错误响应格式
    protected function failedValidation(Validator $validator)
    {
        //上面是正常请求,下面是ajax请求
        if($this->getCurrentMethod()=='store' || $this->getCurrentMethod()=='update'){
            throw (new ValidationException($validator))
                ->errorBag($this->errorBag)
                ->redirectTo($this->getRedirectUrl());
        }else{
            // 此处自定义想要返回的数据类型
            $data = [
                'status' => 'ERROR',
                'msg' => $validator->errors()->first(),
            ];
            $respone = new Response();
            $json_data = $respone->setContent($data);
            throw (new ValidationException($validator,$json_data))
                ->errorBag($this->errorBag)
                ->redirectTo($this->getRedirectUrl());

        }
    }
}