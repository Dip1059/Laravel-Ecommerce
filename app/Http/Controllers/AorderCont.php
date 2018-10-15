<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use DB;
use Session;
session_start();
use Cart;


class AorderCont extends Controller
{
    public function order()
    {
    	$username=Session::get('username');
        if($username)
        {
	    	$data=DB::table('order')
    			->join('customer','customer.cus_id','=','order.cus_id')
    			->select('order.*','customer.cus_name')
    			->get();

    		return view('Admin.order')
    			->with('data',$data);
    	}
    	else
            return Redirect::to('/ad_min');
    }

     public function showord($ord_id)
    {
    	$username=Session::get('username');
        if($username)
        {
	    	$data=DB::table('order')
	    		->join('order_details','order.ord_id','=','order_details.ord_id')
    			->join('billto','order.bill_id','=','billto.bill_id')
    			->join('customer','order.cus_id','=','customer.cus_id')
				->select('order_details.*','order.*','billto.*','customer.*')
				->where('order.ord_id',$ord_id)
    			->get();

    		return view('Admin.orddetails')
    			->with('data',$data);
    	}
    	else
            return Redirect::to('/ad_min');
            
    }

}
