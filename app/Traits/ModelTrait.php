<?php

namespace App\Traits;

trait ModelTrait
{
    public function getListByPage($where=[],$num=10)
    {
        return $this->where($where)->paginate($num);
    }

    public function add($data)
    {
        foreach ($data as $k=>$v)
        {
            $this->$k = $v;
        }
        return $this->save();
    }

    public function oneInfo($where)
    {
        return $this->where($where)->first();
    }

    public function updateOne($where,$data)
    {
        $info = $this->oneInfo($where);
        foreach ($data as $k=>$v)
        {
            $info->$k = $v;
        }
        return $info->save();
    }

    public function del($where)
	{
		return  $this->oneInfo($where)->delete();
	}


}