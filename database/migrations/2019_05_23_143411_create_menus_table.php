<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('pid');
			$table->string('name')->charset('utf8mb4')->collation('utf8mb4_general_ci')->comment('菜单名称');
			$table->string('icon')->charset('utf8mb4')->collation('utf8mb4_general_ci')->comment('图标');
			$table->string('url')->charset('utf8mb4')->collation('utf8mb4_general_ci')->comment('导航地址');
			$table->integer('sort');
			$table->integer('status')->comment('状态 0显示 1不显示');
            $table->timestamps();
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
        Schema::dropIfExists('menus');
    }
}
