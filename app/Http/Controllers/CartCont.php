<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Redirect;

class CartCont extends Controller
{
	public function addcart(Request $req)    
	{
		$data=array();
		$qty=$req->qty;
		$id=$req->id;
		$prodata=DB::table('product')
				->where('pro_id',$id)
				->first();

		$data['id']=$prodata->pro_id;
		$data['qty']=$qty;
		$data['name']=$prodata->pro_name;
		$data['price']=$prodata->pro_price;
		$data['options']['img']=$prodata->pro_img;
		Cart::add($data);

		return Redirect::to('/show_cart');
	}

	public function showcart()
	{
		return view('User.cart');
	}


	public function upcart(Request $req)
	{
		$qty=$req->qty;
		$rowId=$req->rowId;
		Cart::update($rowId,$qty);
		return Redirect::to('/show_cart');
	}

	public function delcart($rowId)
	{
		Cart::update($rowId,0);
		return Redirect::to('/show_cart');
	}

}
