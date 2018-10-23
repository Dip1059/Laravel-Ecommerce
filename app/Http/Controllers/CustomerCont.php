<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use DB;
use Session;
session_start();
use Cart;

class CustomerCont extends Controller
{
    public function checkout()
    {
    	return view('User.ulogin');
    }

    public function savecus(Request $req)
    {
    	$data=array();
    	$data['cus_name']=$req->name;
    	$data['cus_email']=$req->email;
    	$data['cus_pass']=md5($req->pass);
    	$data['cus_phone']=$req->phone;

    	$cus_id=DB::table('customer')
    		->insertGetId($data);
    	Session::put('cus_id',$cus_id);
    	return Redirect::to('/bill_to');
    }

    public function billto()
    {
    	$cus_id=Session::get('cus_id');
    	$total=Cart::total();
    	if($cus_id && $total>0)
			return view('User.billto');
    	else
    		return Redirect::to('/');
    		
    }

    public function savebillto(Request $req)
    {
    	$data=array();
    	$data['bill_name']=$req->name;
    	$data['bill_email']=$req->email;
    	$data['bill_addr']=$req->addr;
    	$data['bill_phone']=$req->phone;

    	$bill_id=DB::table('billto')
    				->insertGetId($data);
    	Session::put('bill_id',$bill_id);
    	return Redirect::to('/show_cart');
    }

    public function payment()
    {
    	return view('User.payment');
    }

    public function savepay(Request $req)
    {
    	$data=array();
    	$data['pay_method']=$req->method;
		$pay_id=DB::table('payment')
    				->insertGetId($data);

    	Session::put('pay_id',$pay_id);
    	return Redirect::to('/success');
    }

    public function success()
    {
    	$orddata=array();
    	$orddata['cus_id']=Session::get('cus_id');
    	$orddata['bill_id']=Session::get('bill_id');
    	$orddata['pay_id']=Session::get('pay_id');
    	$orddata['ord_total']=Cart::total();

    	$ord_id=DB::table('order')
    			->insertGetId($orddata);

    	
    	$cart=Cart::content();

    	$ordsdata=array();
    	foreach($cart as $content)
    	{
    		$ordsdata['ord_id']=$ord_id;
    		$ordsdata['pro_id']=$content->id;
    		$ordsdata['pro_name']=$content->name;
    		$ordsdata['pro_price']=$content->price;
			$ordsdata['pro_qty']=$content->qty;

    		DB::table('order_details')
    			->insert($ordsdata);
    	}
    	Session::put('bill_id',null);
    	Cart::destroy();
    	return view('User.success');
    }

    public function clogout()
    {
    	Session::flush();
    	return Redirect::to('/');
    }

    public function clogcheck(Request $req)
    {
    	$email=$req->email;
    	$pass=md5($req->pass);

    	$success=DB::table('customer')
    				->where([['cus_email','=',$email],['cus_pass','=',$pass]])
    				->first();
    	if($success)
		{    
			Session::put('cus_id',$success->cus_id);
			return Redirect::to('/show_cart');
		}
		else
		{
			Session::put('msg','Wrong Credentials');
			return Redirect::to('/checkout');
		}
    }
}
