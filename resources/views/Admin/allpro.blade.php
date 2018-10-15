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
								  <th>Product Id</th>
								  <th>Product Name</th>
								  <th>Category Name</th>
								  <th>Brand Name</th>
								  <th>Product Description</th>
								  <th>Product Image</th>
								  <th>Product Price (Tk)</th>
								  <th>Product Size</th>
								  <th>Product Color</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
							@foreach($data as $pro)
							<tr>
								<td>{{$pro->pro_id}}</td>
								<td class="center">{{$pro->pro_name}}</td>
								<td class="center">{{$pro->cat_name}}</td>
								<td class="center">{{$pro->brand_name}}</td>
								<td class="center">{{$pro->pro_des}}</td>
								<td class="center"><img src="{{URL::to($pro->pro_img)}}" style="height:60px;width:60px">
								</td>
								<td class="center">{{$pro->pro_price}}</td>
								<td class="center">{{$pro->pro_size}}</td>
								<td class="center">{{$pro->pro_color}}</td>
								<td class="center">
									@if($pro->pro_pub_stat==1)
									
										<span class="label label-success">Active</span>
									
									@else
									
										<span class="label">Inactive</span>
									
									@endif
								</td>

									<td class="center">
										@if($pro->pro_pub_stat==1)
											<a class="btn" href="{{URL::to('/inactive_pro/'.$pro->pro_id)}}">
												<span class="halflings-icon white thumbs-down"></span>  
											</a>

										@else
											<a class="btn btn-success" href="{{URL::to('/active_pro/'.$pro->pro_id)}}">
												<span class="halflings-icon white thumbs-up"></span>  
											</a>
										@endif
										
									<a class="btn btn-info" href="{{URL::to('/edit_pro/'.$pro->pro_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete_pro/'.$pro->pro_id)}}" id='delete'>
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
@endsection('content')