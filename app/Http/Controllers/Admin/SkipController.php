<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkipController extends AdminBaseController
{
    public function index()
	{
		return view('admin.skip.index');
	}
}
