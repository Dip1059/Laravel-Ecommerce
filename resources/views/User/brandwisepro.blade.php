@extends('User.ulayout')
@section('content')
<div class='container'>
<div class='col-sm-12'>
<div class="features_items"><!--features_items-->
					@foreach($data as $brand)
					@endforeach
                        <h2 class="title text-center">{{$brand->brand_name}} Items</h2>
                        @foreach($data as $pro)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                           <a href="{{URL::to('/pro_details/'.$pro->pro_id)}}"><img src="{{URL::to($pro->pro_img)}}" style='height:150px;width:150px' alt="" /></a>
                                            <h2>{{$pro->pro_price}} Tk</h2>
                                            <p>{{$pro->pro_name}}</p>
                                            <a href="{{URL::to('/pro_details/'.$pro->pro_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                        @endforeach
                    </div><!--features_items-->
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
</div>
</div>
@endsection('content')