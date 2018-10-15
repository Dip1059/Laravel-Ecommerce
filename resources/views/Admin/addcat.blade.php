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
<h2> Add Category </h2>
<div class="box-content">
						<form class="form-horizontal" method="post" action="{{URL('/save_cat')}}">
							{{csrf_field()}}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="cat_name">Category Name</label>
							  <div class="controls">
								<input type="text"  id="cat_name" name='cat_name' required=''>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="cat_des">Category Description</label>
							  <div class="controls">
								<textarea id="cat_des" rows="3" name='cat_des'></textarea>
							  </div>
							</div>

							<div class="control-group">
								<label class="control-label" for="cat_pub_stat">Publication Status: </label><input type="checkbox" id="cat_pub_stat" name="cat_pub_stat" value="1"/> 
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save</button>
							  <button type="reset" class="btn btn-danger">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
@endsection('content')