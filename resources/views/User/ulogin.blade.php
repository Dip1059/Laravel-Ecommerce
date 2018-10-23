@extends('User.ulayout')
@section('content')
@php
	$msg=Session::get('msg');
	if($msg)
	{
		echo "<p class='alert alert-danger'>".$msg."</p>";
		Session::put('msg',null);
	}
@endphp
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="{{URL('/cus_logcheck')}}" method="post">
							{{csrf_field()}}
							<input type="email" placeholder="Email Address" name="email" />
							<input type="password" placeholder="Password" name="pass" />
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="{{URL('/save_cus')}}" method='post'>
							{{csrf_field()}}
							<input type="text" placeholder="Name"/ required='' name='name'>
							<input type="email" placeholder="Email Address" required='' name='email'/>
							<input type="password" placeholder="Password" required='' name='pass'/>
							<input type="text" placeholder="Phone No" required='' name='phone' />
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection('content')