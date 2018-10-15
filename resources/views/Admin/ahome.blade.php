@extends('Admin.alayout')
@section('content')
@php
$username=Session::get('username');
	if($username)
	{
		echo "<h1> Welcome Admin <b>".$username."</h1>";
	}
@endphp
@endsection('content')