@extends('Admin.alayout')
@section('content')
@php
	$msg=Session::get('msg');
	if($msg)
	{
		echo "<p class='alert alert-success'>".$msg."</p>";
		Session::put('msg',null);
	}
@endphp
<h2> Add Brand </h2>
<div class="box-content">
						<form class="form-horizontal" method="post" action="{{URL('/update_brand/'.$data->brand_id)}}">
							{{csrf_field()}}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="brand_name">Brand Name</label>
							  <div class="controls">
								<input type="text"  id="brand_name" name='brand_name' required='' value='{{$data->brand_name}}'>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="brand_des">Brand Description</label>
							  <div class="controls">
								<textarea id="brand_des" rows="3" name='brand_des'>{{$data->brand_des}}</textarea>
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