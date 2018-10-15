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
								  <th>Brand Id</th>
								  <th>Brand Name</th>
								  <th>Brand Description</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
							@foreach($data as $brand)
							<tr>
								<td>{{$brand->brand_id}}</td>
								<td class="center">{{$brand->brand_name}}</td>
								<td class="center">{{$brand->brand_des}}</td>
								<td class="center">
									@if($brand->brand_pub_stat==1)
									
										<span class="label label-success">Active</span>
									
									@else
									
										<span class="label">Inactive</span>
									
									@endif
								</td>

									<td class="center">
										@if($brand->brand_pub_stat==1)
											<a class="btn" href="{{URL::to('/inactive_brand/'.$brand->brand_id)}}">
												<span class="halflings-icon white thumbs-down"></span>  
											</a>

										@else
											<a class="btn btn-success" href="{{URL::to('/active_brand/'.$brand->brand_id)}}">
												<span class="halflings-icon white thumbs-up"></span>  
											</a>
										@endif
										
									<a class="btn btn-info" href="{{URL::to('/edit_brand/'.$brand->brand_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete_brand/'.$brand->brand_id)}}" id='delete'>
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
@endsection('content')