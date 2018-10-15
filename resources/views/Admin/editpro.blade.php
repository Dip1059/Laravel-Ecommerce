@extends('Admin.alayout')
@section('content')
@php
	$msg=Session::get('msg');
	if($msg)
	{
		echo "<p class='alert alert-success'><b>".$msg."</p>";
		Session::put('msg',null);
	}
@endphp
<h2> Add Product </h2>
<div class="box-content">
						<form class="form-horizontal" method="post" action="{{URL('/update_pro/'.$data->pro_id)}}" enctype='multipart/form-data'>
							{{csrf_field()}}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="pro_name">Product Name</label>
							  <div class="controls">
								<input type="text"  id="pro_name" name='pro_name' required='' value='{{$data->pro_name}}'>
							  </div>
							</div>

							<div class="control-group">
								<label class="control-label" for="cat_name">Category (active)</label>
								<div class='controls'>
									<select id='cat_name' required='' name='cat_id'>
										<option value={{$data->cat_id}}>{{$data->cat_name}}</option>
										@php
											$catdata=DB::table('category')
												->where('cat_pub_stat',1)
												->where('cat_name','<>',$data->cat_name)
												->get();

										@endphp
										@foreach($catdata as $cat)
										<option value="{{$cat->cat_id}}">{{$cat->cat_name}}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class='control-group'>
								<label class="control-label" for="brand_name">Brand (active)</label>
								<div class='controls'>
									<select id='brand_name' required='' name='brand_id'>
										<option value={{$data->brand_id}}>{{$data->brand_name}}</option>
										@php
											$branddata=DB::table('brand')
												->where('brand_pub_stat',1)
												->where('brand_name','<>',$data->brand_name)
												->get();
										@endphp
										@foreach($branddata as $brand)
										<option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="pro_des">Product Description</label>
							  <div class="controls">
								<textarea id="pro_des" rows="3" name='pro_des'>{{$data->pro_des}}</textarea>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="pro_img">Product Image</label>
							  <div class="controls">
								<input type="file"  id="pro_img" name='pro_img'>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="pro_price">Product Price</label>
							  <div class="controls">
								<input type="text"  id="pro_price" name='pro_price' required='' value='{{$data->pro_price}}'>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="pro_size">Product Size</label>
							  <div class="controls">
								<input type="text"  id="pro_size" name='pro_size' value='{{$data->pro_size}}'>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="pro_color">Product Color</label>
							  <div class="controls">
								<input type="text"  id="pro_color" name='pro_color' value='{{$data->pro_color}}'>
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save</button>
							  <button type="reset" class="btn btn-danger">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
@endsection('content')