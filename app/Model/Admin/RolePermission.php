<?php

namespace App\Model\Admin;


use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RolePermission extends Model
{
	use ModelTrait;
	/**
	 * 表明模型是否应该被打上时间戳
	 *
	 * @var bool
	 */
	public $timestamps = false;

	public function getAll($where=[])
	{
		return $this->where($where)->get()->toArray();
	}

	public function delList($where=[])
	{
		return $this->where($where)->delete();
	}

	public function addMany($data)
	{
		return DB::table('role_permissions')->insert($data);
	}
}
