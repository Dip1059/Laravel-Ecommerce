<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserCont extends Controller
{
    
	//user home page
    public function uhome()
    {
    	return view('User.uhome');
    }

    //product details page
    public function prodetails($pro_id)
    {
    	$data=DB::table('product')
    			->join('category','category.cat_id','=','product.cat_id')
    			->join('brand','brand.brand_id','=','product.brand_id')
    			->select('product.*','category.cat_name','brand.brand_name')
    			->where('pro_id',$pro_id)
    			->first();
    	return view('User.prodetails')->with('data',$data);
    }

    //category wise product
    public function catwisepro($cat_id)
    {
    	$data=DB::table('product')
    			->join('category','category.cat_id','=','product.cat_id')
    			->select('product.*','category.cat_name')
    			->where('product.cat_id',$cat_id)
    			->where('pro_pub_stat',1)
    			->get();
    	return view('User.catwisepro')->with('data',$data);
    }

    public function brandwisepro($brand_id)
    {
    	$data=DB::table('product')
    			->join('brand','brand.brand_id','=','product.brand_id')
    			->select('product.*','brand.brand_name')
    			->where('product.brand_id',$brand_id)
    			->where('pro_pub_stat',1)
    			->get();
    	return view('User.brandwisepro')->with('data',$data);
    }
}
