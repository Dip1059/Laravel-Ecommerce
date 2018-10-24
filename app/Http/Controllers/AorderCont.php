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
                ->join('payment','order.pay_id','=','payment.pay_id')
    			->select('order.*','customer.cus_name','payment.pay_status')
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
                ->join('payment','order.pay_id','=','payment.pay_id')
    			->join('billto','order.bill_id','=','billto.bill_id')
    			->join('customer','order.cus_id','=','customer.cus_id')
				->select('order_details.*','payment.*','order.*','billto.*','customer.*')
				->where('order.ord_id',$ord_id)
    			->get();

    		return view('Admin.orddetails')
    			->with('data',$data);
    	}
    	else
            return Redirect::to('/ad_min');
            
    }

    public function donepay($pay_id,$ord_id)
    {
        DB::table('payment')
                ->where('pay_id',$pay_id)
                ->update(['pay_status' => 1]);
        Session::put('msg','Payment Status updated.');
        return Redirect::to('/show_ord/'.$ord_id);
    }

    public function pendpay($pay_id,$ord_id)
    {
        DB::table('payment')
                ->where('pay_id',$pay_id)
                ->update(['pay_status' => 0]);
        Session::put('msg','Payment Status updated.');
        return Redirect::to('/show_ord/'.$ord_id);
    }

     public function delivord($ord_id)
    {
        DB::table('order')
                ->where('ord_id',$ord_id)
                ->update(['ord_status' => 1]);
        Session::put('msg','Delivery Status updated.');
        return Redirect::to('/order');
    }

    public function pendord($ord_id)
    {
        DB::table('order')
                ->where('ord_id',$ord_id)
                ->update(['ord_status' => 0]);
        Session::put('msg','Delivery Status updated.');
        return Redirect::to('/order');
    }

    public function deleteord($ord_id)
    {
        DB::table('order')
                ->where('ord_id',$ord_id)
                ->delete();
        Session::put('msg','Order deleted successfully.');
        return Redirect::to('/order');
    }

}
