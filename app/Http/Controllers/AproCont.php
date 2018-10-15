<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
session_start();
use Redirect;
use Input;
use Filesystem;

class AproCont extends Controller
{
    
	//add pro view
     public function addpro()
    {
    	$username=Session::get('username');
        if($username)
            return view('Admin.addpro');
        else
            return Redirect::to('/ad_min');
    }

    //Save product data
    public function savepro(Request $req)
    {
    	$username=Session::get('username');
        if($username)
        {
            $data=array();
    	$data['pro_name']=$req->pro_name;
    	$data['cat_id']=$req->cat_id;
    	$data['brand_id']=$req->brand_id;
    	$data['pro_des']=$req->pro_des;
    	$data['pro_price']=$req->pro_price;
    	$data['pro_size']=$req->pro_size;
    	$data['pro_color']=$req->pro_color;
    	$data['pro_pub_stat']=$req->pro_pub_stat;
        if($data['pro_pub_stat']==null)
            $data['pro_pub_stat']=0;
        $img=$req->file('pro_img');

        if($img)
        {
        	$img_name=str_random(20);
        	$ext=strtolower($img->getClientOriginalExtension());
        	$img_full_name=$img_name.'.'.$ext;
        	$up_path='User/images/products/';
        	$img_url=$up_path.$img_full_name;
        	$success=$img->move($up_path,$img_full_name);
        	if($success)
        	{
        		$data['pro_img']=$img_url;
        	}
        }

    	DB::table('product')
    		->insert($data);
    	Session::put('msg','Product Added Successfully');
    	return Redirect::to('/add_pro');
        }
        else
            return Redirect::to('/ad_min');

    }

    //Show All product with category & brand name
    public function allpro()
    {
    	$username=Session::get('username');
        if($username)
        {
            $data=DB::table('product')
            	->join('category','category.cat_id','=','product.cat_id')
            	->join('brand','brand.brand_id','=','product.brand_id')
            	->select('product.*','category.cat_name','brand.brand_name')
                ->get();
            return view('Admin.allpro')->with('data',$data);
        }

        else
            return Redirect::to('/ad_min');
    }

    //inactive the Product
    public function inactivepro($pro_id)
    {
        $username=Session::get('username');
        if($username)
        {
            DB::table('product')
            ->where('pro_id',$pro_id)
            ->update(['pro_pub_stat'=>0]);

        Session::put('msg','Product Inactivated');
        return Redirect::to('/all_pro');
        }
        else
            return Redirect::to('/ad_min');
    }


    //active the Product
    public function activepro($pro_id)
    {
        $username=Session::get('username');
        if($username)
        {
            DB::table('product')
            ->where('pro_id',$pro_id)
            ->update(['pro_pub_stat'=>1]);

        Session::put('msg','Product Activated');
        return Redirect::to('/all_pro');
        }
        else
            return Redirect::to('/ad_min');
    }

    //Edit Product
    public function editpro($pro_id)
    {
        $username=Session::get('username');
        if($username)
        {
            $data=DB::table('product')
            	->join('category','category.cat_id','=','product.cat_id')
            	->join('brand','brand.brand_id','=','product.brand_id')
            	->select('product.*','category.cat_name','brand.brand_name')
                ->where('pro_id',$pro_id)
                ->first();
            return view('Admin.editpro')->with('data',$data);
        }
        else
            return Redirect::to('/ad_min');
    }

    //update Product
    public function updatepro(Request $req, $pro_id)
    {
        $username=Session::get('username');
        if($username)
        {
            $data=Input::except(array('_token','pro_img'));
            $img=$req->file('pro_img');
            if($img)
            {
                
                //Deleting the privious image from the folder
                $value=DB::table('product')
            		->where('pro_id',$pro_id)
            		->select('pro_img')
            		->first();
            	$file=new Filesystem();
            		$file->delete($value->pro_img);
            	//....................

            	$img_name=str_random(20);
            	$ext=strtolower($img->getClientOriginalExtension());
            	$img_full_name=$img_name.'.'.$ext;
            	$up_path='User/images/products/';
            	$img_url=$up_path.$img_full_name;
            	$success=$img->move($up_path,$img_full_name);
            	if($success)
            	{
            		$data['pro_img']=$img_url;
            	}
            }

        DB::table('product')
            ->where('pro_id',$pro_id)
            ->update($data);

        Session::put('msg','Product Updated Successfully');
        return Redirect::to('/all_pro');
        }
        else
            return Redirect::to('/ad_min');
    }


    //delete Product
    public function deletepro($pro_id)
    {
        $username=Session::get('username');
        if($username)
        {
        	$data=DB::table('product')
            ->where('pro_id',$pro_id)
            ->select('pro_img')
            ->first();

             DB::table('product')
            ->where('pro_id',$pro_id)
            ->delete();
     		
     		//deleting the image from the folder
     		$file= new Filesystem();
     		//foreach($data as $v)
     			$file->delete($data->pro_img);
     			//unlink($v);
     		//'''''''''''''''
        Session::put('msg','Product Deleted Successfully');
        return Redirect::to('/all_pro');
        }
        else
            return Redirect::to('/ad_min');
    }
}
