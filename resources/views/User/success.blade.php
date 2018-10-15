@extends('User.ulayout')
@section('content')
<div class="container">
<h1 style="color:lightgreen">You have made your order successfully. We will contact with your billing contact no within 30 minutes. Thank you.</h1><br><br>

<a href="{{URL::to('/')}}"><button class='btn btn-success'>Continue Shopping</button></a><br><br><br><br>
</div>
@endsection('content')