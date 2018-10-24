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
<table class="table table-bordered" style='background-color:white'>
						  <thead style='background-color:lightgreen'>
							  <tr>
								  <th>Order Id</th>
								  <th>Customer Name</th>
								  <th>Order Total</th>
								  <th>Payment Status</th>
								  <th>Delivery Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
							@foreach($data as $ord)
							<tr>
								<td>{{$ord->ord_id}}</td>
								<td class="center">{{$ord->cus_name}}</td>
								<td class="center">{{$ord->ord_total}}</td>
								<td class="center">
									@if($ord->pay_status==1)
									
										<span class="label label-success">Done</span>
									
									@else
									
										<span class="label">Pending</span>
									
									@endif
								</td>
								<td class="center">
									@if($ord->ord_status==1)
									
										<span class="label label-success">Delivered</span>
									
									@else
									
										<span class="label">Pending</span>
									
									@endif
								</td>

									<td class="center">
										@if($ord->ord_status==1)
											<a class="btn" href="{{URL::to('/pend_ord/'.$ord->ord_id)}}">
												<span class="halflings-icon white thumbs-down"></span>  
											</a>

										@else
											<a class="btn btn-success" href="{{URL::to('/deliv_ord/'.$ord->ord_id)}}">
												<span class="halflings-icon white thumbs-up"></span>  
											</a>
										@endif
										
									<a class="btn btn-info" href="{{URL::to('/show_ord/'.$ord->ord_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete_ord/'.$ord->ord_id)}}" id='delete'>
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
@endsection('content')