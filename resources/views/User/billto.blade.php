@extends('User.ulayout')
@section('content')
<div class-='container'>
	<div align='center'>
						<p>Bill To</p>
							<form action="{{URL('/save_billto')}}" method='post'>
									{{csrf_field()}}
									<input type="text" placeholder="Name*" required='' name='name'><br><br>
									<input type="email" placeholder="Email*" required='' name='email'><br><br>
									<input type="text" placeholder="Address*" required='' name='addr'><br><br>
									<input type="text" placeholder="Phone*" required='' name='phone'><br><br>
									<input type="Submit" value='Done'><br><br><br><br><br><br>

								</form>
							</div>
				</div>
@endsection('content')