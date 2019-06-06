<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['namespace' => 'Admin', 'prefix' => 'backstage','middleware'=>'admin'], function () {
	/**
	 * 登录相关
	 */
	Route::group(['prefix' => 'login'], function () {
		Route::get('/', 'LoginController@showLoginForm');//后台登录页
		Route::get('login', 'LoginController@showLoginForm');//后台登录页
		Route::post('login', 'LoginController@login');//登录信息
		Route::get('logout', 'LoginController@logout');//退出
	});

	/**
	 * 首页和框架加载
	 */
	Route::get('/', 'IndexController@index');//后台首页
	Route::get('index/index', 'IndexController@index');//后台首页
	Route::get('index', 'IndexController@index');//后台首页
	Route::get('base', 'IndexController@base');//后台框架页面
	Route::get('index/base', 'IndexController@base');//后台框架页面

	/**
	 * 管理员相关
	 */
	Route::group(['prefix' => 'admin'], function () {
		Route::get('index', 'AdminController@index');
		Route::get('create', 'AdminController@create');
		Route::post('store', 'AdminController@store');
		Route::get('edit/{id}', 'AdminController@edit');
		Route::post('update/{id}', 'AdminController@update');
		Route::post('del', 'AdminController@del');
		Route::post('restore', 'AdminController@restore');
	});
	/**
	 * 角色相关
	 */
	Route::group(['prefix' => 'role'], function () {
		Route::get('index', 'RoleController@index');
		Route::get('create', 'RoleController@create');
		Route::post('store', 'RoleController@store');
		Route::get('edit/{id}', 'RoleController@edit');
		Route::post('update/{id}', 'RoleController@update');
		Route::post('del', 'RoleController@del');
	});
	/**
	 * 权限相关
	 */
	Route::group(['prefix' => 'permission'], function () {
		Route::get('index/{id}', 'PermissionController@roleAuthorize');
		Route::post('update/{id}', 'PermissionController@roleAuthorizeUpdate');
	});
	/**
	 * 菜单和权限挂钩
	 */
	Route::group(['prefix' => 'menu'], function () {
		Route::get('index', 'MenuController@index');//列表
		Route::get('create', 'MenuController@create');//添加
		Route::post('store', 'MenuController@store');
		Route::get('edit/{id}', 'MenuController@edit'); //编辑
		Route::post('update/{id}', 'MenuController@update');//修改
		Route::post('del', 'MenuController@del');//删除
	});
	/**
	 * 菜单和权限挂钩
	 */
	Route::group(['prefix' => 'skip'], function () {
		Route::get('index', 'SkipController@index');//列表
	});

});
