<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
  public function index(){
  	$master_content=view('frontend.master_content');
  	return view ('frontend.master')->with('content',$master_content);
  }
}
