<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('roles', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name')->charset('utf8mb4')->collation('utf8mb4_general_ci')->comment('角色名称');
			$table->string('descript')->charset('utf8mb4')->collation('utf8mb4_general_ci')->comment('描述');
			$table->timestamps();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
		});

		Schema::create('role_permissions', function (Blueprint $table) {
			$table->integer('permission_id')->unsigned();
			$table->integer('role_id')->unsigned();
			$table->primary(['permission_id', 'role_id']);
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
		});

		Schema::create('role_admins', function (Blueprint $table) {
			$table->integer('role_id')->unsigned();
			$table->integer('admin_id')->unsigned();

			$table->foreign('admin_id')
				->references('id')
				->on('admins')
				->onDelete('cascade');

			$table->foreign('role_id')
				->references('id')
				->on('roles')
				->onDelete('cascade');

			$table->primary(['admin_id', 'role_id']);
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
        Schema::dropIfExists('role_permissions');
        Schema::dropIfExists('role_users');
    }
}

