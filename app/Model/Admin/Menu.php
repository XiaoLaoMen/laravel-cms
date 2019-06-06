<?php

namespace App\Model\Admin;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use ModelTrait;
	public function getAll($where=[])
	{
		return $this->where($where)->orderBy('sort','desc')->get()->toArray();
	}

}
