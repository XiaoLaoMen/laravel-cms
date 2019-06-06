<?php

namespace App\Model\Admin;

use App\Traits\ModelTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
class Admin extends Authenticatable
{
	use Notifiable;
	use ModelTrait;
	use SoftDeletes;
	protected $dates=['deleted_at'];
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password',
	];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

    /**
     * Notes:添加管理员(事物)
     * User: 你猜呢
     * Date: 2019/5/25
     * Time: 10:36
     * @param $data
     * @param $role
     * @return bool
     */
    public function addAdminAndRole($data,$role)
    {
        DB::beginTransaction();
        try{
            $addAdminResult = $this->create($data);
            if (!$addAdminResult) {
                DB::rollback();
                return false;
            }
            $id = DB::getPdo()->lastInsertId();
            $roles = array();
            foreach ($role as $v)
            {
                $roles[]=array('admin_id'=>$id,'role_id'=>$v);
            }
            $addAdminRoleResult = RoleAdmin::insert($roles);
            if(!$addAdminRoleResult){
                DB::rollback();
                return false;
            }
            DB::commit();
            return true;
        } catch (\Exception $e){
            DB::rollback();
            return false;
        }
    }

    /**
     * Notes:管理员修改
     * User: 你猜呢
     * Date: 2019/5/25
     * Time: 14:03
     * @param $id
     * @param $data
     * @param $role
     * @return bool
     */
    public function updateAdminAndRole($id,$data,$role)
    {
        DB::beginTransaction();
        try{
            $where[]=['id','=',$id];
            $updateAdminResult = $this->where($where)->update($data);
            if (!$updateAdminResult) {
                DB::rollback();
                return false;
            }
            //删除用户角色
            $delAdminRoles = RoleAdmin::where('admin_id','=',$id)->delete();
            if (!$delAdminRoles) {
                DB::rollback();
                return false;
            }
            //重新添加角色
            $roles = array();
            foreach ($role as $v)
            {
                $roles[]=array('admin_id'=>$id,'role_id'=>$v);
            }
            $addAdminRoleResult = RoleAdmin::insert($roles);

            if(!$addAdminRoleResult){
                DB::rollback();
                return false;
            }
            DB::commit();
            return true;
        } catch (\Exception $e){
            DB::rollback();
            return false;
        }
    }

	public function getListByPage($where=[],$num=10)
	{
		return $this->withTrashed()->where($where)->paginate($num);
	}

	public function restoreOne($where)
	{
		return  $this->withTrashed()->where($where)->first()->restore();
	}
}
