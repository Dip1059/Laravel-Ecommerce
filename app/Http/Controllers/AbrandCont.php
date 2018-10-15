<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
session_start();
use Redirect;
use Input;

class AbrandCont extends Controller
{
    
    //Add brand view
    public function addbrand()
    {
    	$username=Session::get('username');
        if($username)
            return view('Admin.addbrand');
        else
            return Redirect::to('/ad_min');
    }

    //Save brand data
    public function savebrand(Request $req)
    {
    	$username=Session::get('username');
        if($username)
        {
            $data=array();
    	$data['brand_name']=$req->brand_name;
    	$data['brand_des']=$req->brand_des;
    	$data['brand_pub_stat']=$req->brand_pub_stat;
        if($data['brand_pub_stat']==null)
            $data['brand_pub_stat']=0;

    	DB::table('brand')
    		->insert($data);
    	Session::put('msg','Brand Added Successfully');
    	return Redirect::to('/add_brand');
        }
        else
            return Redirect::to('/ad_min');

    }

    //Show All brand
    public function allbrand()
    {
    	$username=Session::get('username');
        if($username)
        {
                $data=DB::table('brand')
                ->get();
            return view('Admin.allbrand')->with('data',$data);
        }

        else
            return Redirect::to('/ad_min');
    }

    //inactive the brand
    public function inactivebrand($brand_id)
    {
        $username=Session::get('username');
        if($username)
        {
            DB::table('brand')
            ->where('brand_id',$brand_id)
            ->update(['brand_pub_stat'=>0]);

        Session::put('msg','Brand Inactivated');
        return Redirect::to('/all_brand');
        }
        else
            return Redirect::to('/ad_min');
    }


    //active the brand
    public function activebrand($brand_id)
    {
        $username=Session::get('username');
        if($username)
        {
            DB::table('brand')
            ->where('brand_id',$brand_id)
            ->update(['brand_pub_stat'=>1]);

        Session::put('msg','Brand Activated');
        return Redirect::to('/all_brand');
        }
        else
            return Redirect::to('/ad_min');
    }

    //Edit brand
    public function editbrand($brand_id)
    {
        $username=Session::get('username');
        if($username)
        {
            $data=DB::table('brand')
                ->where('brand_id',$brand_id)
                ->first();
            return view('Admin.editbrand')->with('data',$data);
        }
        else
            return Redirect::to('/ad_min');
    }

    //update brand
    public function updatebrand(Request $req, $brand_id)
    {
        $username=Session::get('username');
        if($username)
        {
            $data=Input::except(array('_token'));

        DB::table('brand')
            ->where('brand_id',$brand_id)
            ->update($data);

        Session::put('msg','Brand Updated Successfully');
        return Redirect::to('/all_brand');
        }
        else
            return Redirect::to('/ad_min');
    }


    //delete brand
    public function deletebrand($brand_id)
    {
        $username=Session::get('username');
        if($username)
            {
                DB::table('brand')
            ->where('brand_id',$brand_id)
            ->delete();

        Session::put('msg','Brand Deleted Successfully');
        return Redirect::to('/all_brand');
        }
        else
            return Redirect::to('/ad_min');
    }


}
