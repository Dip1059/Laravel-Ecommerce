@extends('Admin.alayout')
@section('content')
<div class='container'>

@php
$msg=Session::get('msg');
	if($msg)
	{
		echo "<p class='alert alert-success'><b>".$msg."</p>";
		Session::put('msg',null);
	}
@endphp
<div class='col-sm-4'>
	<h1>Customer Details</h1>
<table title="Customer Details" class="table table-bordered" style='background-color:white'>
						  <thead style='background-color:lightgreen'>
							  <tr>
								  <th>Customer Name</th>
								  <th>Phone No</th>
								  <th>Email</th>
							  </tr>
						  </thead>   
						  <tbody>
							@foreach($data as $cus)
							@endforeach
							<tr>
								<td>{{$cus->cus_name}}</td>
								<td>{{$cus->cus_phone}}</td>
								<td>{{$cus->cus_email}}</td>
							</tr>
							
						</tbody>
					</table>
</div>
</div>
<div class='container'>
<div class='col-sm-8'>
	<h1>Billing Details</h1>
<table title="Billing Details" class="table table-bordered" style='background-color:white'>
						  <thead style='background-color:lightgreen'>
							  <tr>
								  <th>Bill To</th>
								  <th>Address</th>
								  <th>Phone No</th>
								  <th>Email</th>
							  </tr>
						  </thead>   
						  <tbody>
							@foreach($data as $billto)
							@endforeach
							<tr>
								<td>{{$billto->bill_name}}</td>
								<td>{{$billto->bill_addr}}</td>
								<td>{{$billto->bill_phone}}</td>
								<td>{{$billto->bill_email}}</td>
							</tr>
							
						</tbody>
					</table>
					<br><br>
	</div>
</div>

<div class='container'>
<div class='col-sm-8'>
	<h1>Order Details</h1>
<table title="Order Details" class="table table-bordered" style='background-color:white'>
						  <thead style='background-color:lightgreen'>
							  <tr>
								  <th>Order Id</th>
								  <th>Product Name</th>
								  <th>Product Price</th>
								  <th>Quantity</th>
								  <th>Subtotal</th>
							  </tr>
						  </thead>   
						  <tbody>
							@foreach($data as $ords)
							<tr>
								<td>{{$ords->ord_id}}</td>
								<td>{{$ords->pro_name}}</td>
								<td>{{$ords->pro_price}}</td>
								<td>{{$ords->pro_qty}}</td>
								<td>{{$ords->pro_price*$ords->pro_qty}}</td>
							</tr>
							@endforeach
							<tfoot><tr>
								<td><b>Total (With VAT)</td>
								<td></td>
								<td></td>
								<td></td>
								<td><b> ={{$ords->ord_total}}</td>
							</tr>
						</tfoot>
							
						</tbody>
					</table>
					<br><br>
	</div>
</div>

@endsection('content')