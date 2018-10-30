@extends('layouts.app')
@section('title', 'Joshim Blog')
@section('sidebar')
    @parent
@endsection
@section('content')
@if (Auth::guest())
    <div align="center">
    <h2>     
    <a href="{{ route('login') }}">Please Login</a>
    </h2>
    </div>
@elseif (Auth::user()->status==0)
    <div align="center">
    <h2>     
    <a href="{{ route('login') }}">Please Login</a>
    </h2>
    </div>    
@else

<div class="container">
	<h3 align="center">Add</h3>
	<hr>
	<form method="post" action="{{url('parents_store')}}" enctype="multipart/form-data">
		  {{ csrf_field() }}
		  <div class="row form-group">
			<div class="col-md-2 col-sm-2">
				<label for="name">Name :</label>
			</div>
			<div class="col-md-10 col-sm-10">
				<input type="text" id="name" name="name" class="form-control"/>
			</div>
		</div>
		<br/>
		<div class="row form-group">
			<div class="col-md-2 col-sm-2">
				<label for="location">Location :</label>
			</div>
			<div class="col-md-10 col-sm-10">
				<input type="text" id="clocation" name="clocation" class="form-control"/>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-2 col-sm-2">
				<label for="house_no">House No :</label>
			</div>
			<div class="col-md-10 col-sm-10">
				<input type="number" id="house_no" name="house_no" class="form-control"/>
			</div>
		</div>
		<br/>
		<br/>
		<div class="row">
			<div class="col-md-2 col-sm-2">
				<label for="road_no">Road No :</label>
			</div>
			<div class="col-md-10 col-sm-10">
				<input type="number" id="road_no" name="road_no" class="form-control"/>
			</div>
		</div>
		<br/>
			<div class="row">
			<div class="col-md-2 col-sm-2">
				<label for="vil">village :</label>
			</div>
			<div class="col-md-10 col-sm-10">
				<input type="text" id="village" name="village" class="form-control">
			</div>
		</div>
		<br/>
			<div class="row">
			<div class="col-md-2 col-sm-2">
				<label for="email">Email :</label>
			</div>
			<div class="col-md-10 col-sm-10">
				<input type="email" id="email" name="email" class="form-control">
			</div>
		</div>
		<br/>
			<div class="row">
			<div class="col-md-2 col-sm-2">
				<label for="mbl">mobile :</label>
			</div>
			<div class="col-md-10 col-sm-10">
				<input type="number" id="mobile" name="mobile" class="form-control">
			</div>
		</div>
		<br/>
			<div class="row">
			<div class="col-md-2 col-sm-2">
				<label for="subject">Subject :</label>
			</div>
			<div class="col-md-10 col-sm-10">
				<input type="text" id="subject" name="subject" class="form-control">
			</div>
		</div>
		<br/>
			<div class="row">
			<div class="col-md-2 col-sm-2">
				<label for="qual">qualification :</label>
			</div>
			<div class="col-md-10 col-sm-10">
				<input type="text" id="qualification" name="qualification" class="form-control">
			</div>
		</div>
		<br/>
			<div class="row">
			<div class="col-md-2 col-sm-2">
				<label for="rang">Rang :</label>
			</div>
			<div class="col-md-10 col-sm-10">
				<input type="number" id="rang" name="rang" class="form-control">
			</div>
		</div>
		<br/>
			<div class="row">
			<div class="col-md-2 col-sm-2">
				<label for="time">time :</label>
			</div>
			<div class="col-md-10 col-sm-10">
				<input type="text" id="time" name="time" class="form-control">
			</div>
		</div>
		<br/>
			<div class="row">
			<div class="col-md-2 col-sm-2">
				<label for="day">Day :</label>
			</div>
			<div class="col-md-10 col-sm-10">
				<input type="text" id="day" name="day" class="form-control">
			</div>
		</div>
           <br/>
           <div class="row">
			<div class="col-md-12 col-sm-12">
				<input type="submit" id="submit" name="submit" value="submit" class="form-control btn btn-info" />
			</div>
		</div>
	</form>
</div>

@endif

@endsection
@section('foot')
    @parent

@endsection