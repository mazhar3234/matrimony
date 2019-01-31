<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;

class UserController extends Controller
{
	public function register()
	{
		return view ('frontend.pages.register');
	}
	public function login()
	{
		return view ('frontend.pages.login');
	}

}
