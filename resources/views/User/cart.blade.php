@extends('User.ulayout')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="col-sm-12">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@php
							$data=Cart::content();
						@endphp
						@foreach($data as $val)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{asset($val->options->img)}}" alt="" style='width:80px;height:80px'></a>
							</td>
							<td>
								<h4>{{$val->name}}</h4>
							</td>
							<td class="cart_price">
								<p>{{$val->price}} Tk</p>
							</td>
							<td class="cart_quantity">
									<form action="{{URL('/up_cart')}}" method="post">
									{{csrf_field()}}
									<input type="text" name="qty" value='{{$val->qty}}' size='2'>
									<input type='hidden' value='{{$val->rowId}}' name='rowId'>
									<input type='submit' class='btn btn-success' value='Update'>

								</form>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$val->total}} Tk</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL('/del_cart/'.$val->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		</div>
	</section>
	<div class="col-sm-3">
	</div>
	<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{Cart::subtotal()}} Tk</span></li>
							<li>Eco Tax <span>{{Cart::tax()}}</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>{{Cart::total()}}</span></li>
						</ul>
						@php
							$bill_id=Session::get('bill_id');
						@endphp
							@if($bill_id)
							
							@else
								<a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Check Out</a>
							@endif
					</div>
				</div>
	<div class='container'>
	<p></p>
</div>
<div class='container'>
	<p></p>
</div>
@if($bill_id)
<div class='container'>
	<div align='center'>
<h1>Select Your Payment Method.</h1>
<form action='{{URL('/save_pay')}}' method='post'>
	{{csrf_field()}}
	<input type='radio' value='handcash' name='method' required=''> HandCash<br><br>
	<input type='radio' value='paypal' name='method' required=''> PayPal<br><br>
	<input type='radio' value='bkash' name='method' required=''> bkash<br><br>
	<input type='submit' value="Done">
</form>
</div>
</div>
@else

@endif
</form>
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