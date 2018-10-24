<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/****Admin Routes****/

//Admin login, logout & home Routes
Route::get('/ad_min','AhomeCont@index');
Route::post('/admin_login','AhomeCont@alogin');
Route::get('/admin_home','AhomeCont@ahome');
Route::get('/admin_logout/{v}','AhomeCont@alogout');

//Category Routes
Route::get('/add_cat','AcatCont@addcat');
Route::post('/save_cat','AcatCont@savecat');
Route::get('/all_cat','AcatCont@allcat');
Route::get('/inactive_cat/{cat_id}','AcatCont@inactivecat');
Route::get('/active_cat/{cat_id}','AcatCont@activecat');
Route::get('/edit_cat/{cat_id}','AcatCont@editcat');
Route::post('/update_cat/{cat_id}','AcatCont@updatecat');
Route::get('/delete_cat/{cat_id}','AcatCont@deletecat');

//Brand Routes
Route::get('/add_brand','AbrandCont@addbrand');
Route::post('/save_brand','AbrandCont@savebrand');
Route::get('/all_brand','AbrandCont@allbrand');
Route::get('/inactive_brand/{brand_id}','AbrandCont@inactivebrand');
Route::get('/active_brand/{brand_id}','AbrandCont@activebrand');
Route::get('/edit_brand/{brand_id}','AbrandCont@editbrand');
Route::post('/update_brand/{brand_id}','AbrandCont@updatebrand');
Route::get('/delete_brand/{brand_id}','AbrandCont@deletebrand');

//Product Routes
Route::get('/add_pro','AproCont@addpro');
Route::post('/save_pro','AproCont@savepro');
Route::get('/all_pro','AproCont@allpro');
Route::get('/inactive_pro/{pro_id}','AproCont@inactivepro');
Route::get('/active_pro/{pro_id}','AproCont@activepro');
Route::get('/edit_pro/{pro_id}','AproCont@editpro');
Route::post('/update_pro/{pro_id}','AproCont@updatepro');
Route::get('/delete_pro/{pro_id}','AproCont@deletepro');

//Order Routes
Route::get('/order','AorderCont@order');
Route::get('/show_ord/{ord_id}','AorderCont@showord');
Route::get('/done_pay/{pay_id}/{ord_id}','AorderCont@donepay');
Route::get('/pend_pay/{pay_id}/{ord_id}','AorderCont@pendpay');
Route::get('/pend_ord/{ord_id}','AorderCont@pendord');
Route::get('/deliv_ord/{ord_id}','AorderCont@delivord');
Route::get('/delete_ord/{ord_id}','AorderCont@deleteord');

/****Admin Routes****/



/****User Routes****/

Route::get('/','UserCont@uhome');
Route::get('/pro_details/{pro_id}','UserCont@prodetails');
Route::get('/cat_wise_pro/{cat_id}','UserCont@catwisepro');
Route::get('/brand_wise_pro/{brand_id}','UserCont@brandwisepro');

//Cart Routes
Route::post('/add_cart','CartCont@addcart');
Route::get('/show_cart','CartCont@showcart');
Route::post('/up_cart','CartCont@upcart');
Route::get('/del_cart/{rowId}','CartCont@delcart');

//Customer Routes
Route::get('/checkout','CustomerCont@checkout');
Route::post('/save_cus','CustomerCont@savecus');
Route::get('/cus_logout','CustomerCont@clogout');
Route::post('/cus_logcheck','CustomerCont@clogcheck');
Route::get('/bill_to','CustomerCont@billto');
Route::post('/save_billto','CustomerCont@savebillto');
Route::post('/save_pay','CustomerCont@savepay');
Route::get('/success','CustomerCont@success');


