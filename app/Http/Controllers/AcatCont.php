<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
session_start();
use Redirect;
use Input;

class AcatCont extends Controller
{
    
    //Add Category view
    public function addcat()
    {
    	$username=Session::get('username');
        if($username)
            return view('Admin.addcat');
        else
            return Redirect::to('/ad_min');
    }

    //Save Category data
    public function savecat(Request $req)
    {
    	$username=Session::get('username');
        if($username)
        {
            $data=array();
    	$data['cat_name']=$req->cat_name;
    	$data['cat_des']=$req->cat_des;
    	$data['cat_pub_stat']=$req->cat_pub_stat;
        if($data['cat_pub_stat']==null)
            $data['cat_pub_stat']=0;

    	DB::table('category')
    		->insert($data);
    	Session::put('msg','Category Added Successfully');
    	return Redirect::to('/add_cat');
        }
        else
            return Redirect::to('/ad_min');

    }

    //Show All category
    public function allcat()
    {
    	$username=Session::get('username');
        if($username)
        {
                $data=DB::table('category')
                ->get();
            return view('Admin.allcat')->with('data',$data);
        }

        else
            return Redirect::to('/ad_min');
    }

    //inactive the category
    public function inactivecat($cat_id)
    {
        $username=Session::get('username');
        if($username)
        {
            DB::table('category')
            ->where('cat_id',$cat_id)
            ->update(['cat_pub_stat'=>0]);

        Session::put('msg','Category Inactivated');
        return Redirect::to('/all_cat');
        }
        else
            return Redirect::to('/ad_min');
    }


    //active the category
    public function activecat($cat_id)
    {
        $username=Session::get('username');
        if($username)
        {
            DB::table('category')
            ->where('cat_id',$cat_id)
            ->update(['cat_pub_stat'=>1]);

        Session::put('msg','Category Activated');
        return Redirect::to('/all_cat');
        }
        else
            return Redirect::to('/ad_min');
    }

    //Edit category
    public function editcat($cat_id)
    {
        $username=Session::get('username');
        if($username)
        {
            $data=DB::table('category')
                ->where('cat_id',$cat_id)
                ->first();
            return view('Admin.editcat')->with('data',$data);
        }
        else
            return Redirect::to('/ad_min');
    }

    //update category
    public function updatecat(Request $req, $cat_id)
    {
        $username=Session::get('username');
        if($username)
        {
            $data=Input::except(array('_token'));

        DB::table('category')
            ->where('cat_id',$cat_id)
            ->update($data);

        Session::put('msg','Category Updated Successfully');
        return Redirect::to('/all_cat');
        }
        else
            return Redirect::to('/ad_min');
    }


    //delete category
    public function deletecat($cat_id)
    {
        $username=Session::get('username');
        if($username)
            {
                DB::table('category')
            ->where('cat_id',$cat_id)
            ->delete();

        Session::put('msg','Category Deleted Successfully');
        return Redirect::to('/all_cat');
        }
        else
            return Redirect::to('/ad_min');
    }


}
