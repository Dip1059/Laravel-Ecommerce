@extends('User.ulayout')
@section('content')
<div class='container'>
	<div class='col-sm-6'>
		<img src='{{URL::to($data->pro_img)}}' style='height:400px;width:350px'>
	</div>

	<div class='col-sm-2'>
		<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
		<h4>Name: </h4>
		<h4>Category: </h4>
		<h4>Brand: </h4>
		<h4>Description: </h4>
		<h4>Price: </h4>
		<h4>Size: </h4>
		<h4>Color: </h4>
		<h4>Quantity: </h4>
		<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
		<!--<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>-->
	</div>
	<div class='col-sm-4'>
		<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
		<p></p>
		<p>{{$data->pro_name}}</p>
		<p>{{$data->cat_name}}</p>
		<p>{{$data->brand_name}}</p>
		<p>{{$data->pro_des}}</p>
		<p>{{$data->pro_price}} Tk</p>
		<p>{{$data->pro_size}}</p>
		<p>{{$data->pro_color}}</p>
	<form action="{{URL('/add_cart')}}" method='post'>
		{{csrf_field()}}
		<input name='qty' type='text' value='1' style='width:50px'> 
		<input name='id' type='hidden' value={{$data->pro_id}}><br><br>
		<input class="btn btn-default add-to-cart" type='submit' value='Add to Cart'>
	</form>
	</div>
	</div>
</div>
</div>
<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>

@endsection('content')