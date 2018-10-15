<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use DB;
use Session;
use Hash;
session_start();

class AhomeCont extends Controller
{
    
	//Admin login page
	public function index()
	{
		$username=Session::get('username');
    	if($username)
    		return Redirect::to('/admin_home');
    	else
			return view('Admin.alogin');
	}

	//Admin login check
    public function alogin(Request $req)
	{
		$data=array();
		$data['username']=$req->username;
		$data['password']=md5($req->password);

		$success=DB::table('admin')
					->where('username',$data['username'])
					->where('password',$data['password'])
					->first();
		

		
		if($success)
		{
			Session::put('username',$data['username']);
			return Redirect::to('/admin_home');
		}
		
		else
		{	Session::put('msg','Wrong Credentials');
			return Redirect::to('/ad_min');
		}
	}

	//Admin Home Page
	public function ahome()
    {
    	$username=Session::get('username');
    	if($username)
    		return view('Admin.ahome');
    	else
    		return Redirect::to('/ad_min');
    }

    //Admin logout
    public function alogout($v)
    {
    	if($v==md5('1'))
    	{
    		Session::flush();
    	return Redirect::to('/ad_min');
    	}
    }

    
}
