@extends('layouts.header')
@section('title','Dashboard')
@section('breadcrumb')
<ol class="breadcrumb pull-right text-primary">
	<li><i class="fa fa-dashboard"> Dashboard</i></li>
</ol>
@endsection
@section('content')

<div class="panel panel-info">
	<div class="panel-heading">
		Dashboard
	</div>
	<div class="panel-body">
		<h4 class="text-center">Welcome {{Auth::user()->email}}, You are logged in!</h4>
		<div style="font-size:66pt;text-align: center;">
			<i style="color: #00a65a" class="fa fa-graduation-cap"></i><br>
			<div style="font-size:10pt;margin-top: -34px;"><strong><font color="#dd4b39">LINCOLN</font> <font color="#3c8dbc">SCHOOLS</font></strong></div>
		</div>
		<br>
		<br>
		<br>
		<br>
	</div>
</div>

@endsection