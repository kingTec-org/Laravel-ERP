@extends('layouts.header')
@section('breadcrumb')
	<ol class="breadcrumb pull-right">
		<li><i class="fa fa-home"> Home</i></li>
		<li class="active"><i class="fa fa-question"> About</i></li>
	</ol>
@endsection
@section('content')
<div class="panel panel-info">
	<div class="panel-heading">
		About OSMISIS
	</div>
	<div class="panel-body">
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4">
				OSMISIS V.1.0<br>
				Privacy Policy<br>
				Terms of Conditions
			</div>
		</div>
	</div>
</div>
@endsection