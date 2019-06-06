<?php

namespace App\Model\Admin;


use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	use ModelTrait;
	

	public function del($where)
	{
		return  $this->destroy($where);
	}
}
