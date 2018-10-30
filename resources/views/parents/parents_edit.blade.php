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
<h3>Edit Blog Item</h3>
<hr />
<form method="post"  
action="{{ route('parents_update', $id) }}" enctype="multipart/form-data" >
<input type="hidden" name="_token" 
value="{{ csrf_token() }}"> 
<div class="row form-group">
	<div class="col-md-2 col-sm-2">
        <label for='category_id'>
        name:
        </label>
    </div>
	<div class="col-md-10 col-sm-10">
    	<input type="text" id="name" name="name" class="form-control" value="{{ $blogs['name'] }}" />
    </div>
</div>   
<br /> 
<div class="row form-group">
	<div class="col-md-2 col-sm-2">
        <label for='subject'>
        clocation:
        </label>
    </div>
	<div class="col-md-10 col-sm-10">
    	<input type="text" id="clocation" name="clocation" class="form-control" value="{{ $blogs['clocation'] }}" />
    </div>
</div>   
<br /> 

 
<div class="row" >
	<div class="col-md-2 col-sm-2">
        <label for='subject'>
        house_no:
        </label>
    </div>
	<div class="col-md-10 col-sm-10">
    	<input type="text" id="house_no" name="house_no" class="form-control" value="{{ $blogs['house_no'] }}" />
    </div>
</div>
<br />  

<div class="row">
	<div class="col-md-2 col-sm-2">
        <label for='name'>
        road_no:
        </label>
    </div>
	<div class="col-md-10 col-sm-10">
    	<input type="text" id="road_no" name="road_no" class="form-control" value="{{ $blogs['road_no'] }}" />
    </div>
</div>
<br />  

<div class="row">
	<div class="col-md-2 col-sm-2">
        <label for='name'>
        village:
        </label>
    </div>
	<div class="col-md-10 col-sm-10">
    	<input type="text" id="village" name="village" class="form-control" value="{{ $blogs['village'] }}" />
    </div>
</div>
<br />  


<div class="row">
	<div class="col-md-2 col-sm-2">
        <label for='name'>
        email:
        </label>
    </div>
	<div class="col-md-10 col-sm-10">
    	<input type="text" id="email" name="email" class="form-control" value="{{ $blogs['email'] }}" />
    </div>
</div>
<br />  

<div class="row">
	<div class="col-md-2 col-sm-2">
        <label for='name'>
        mobile:
        </label>
    </div>
	<div class="col-md-10 col-sm-10">
    	<input type="text" id="mobile" name="mobile" class="form-control" value="{{ $blogs['mobile'] }}" />
    </div>
</div>
<br />  

<div class="row">
	<div class="col-md-2 col-sm-2">
        <label for='name'>
        subject:
        </label>
    </div>
	<div class="col-md-10 col-sm-10">
    	<input type="text" id="subject" name="subject" class="form-control" value="{{ $blogs['subject'] }}" />
    </div>
</div>
<br />  

<div class="row">
	<div class="col-md-2 col-sm-2">
        <label for='qualification'>
        qualification:
        </label>
    </div>
	<div class="col-md-10 col-sm-10">
    	<input type="text" id="qualification" name="qualification" class="form-control" value="{{ $blogs['qualification'] }}" />
    </div>
</div>
<br />  

<div class="row">
	<div class="col-md-2 col-sm-2">
        <label for='name'>
        rang:
        </label>
    </div>
	<div class="col-md-10 col-sm-10">
    	<input type="text" id="rang" name="rang" class="form-control" value="{{ $blogs['rang'] }}" />
    </div>
</div>
<br />  

<div class="row">
	<div class="col-md-2 col-sm-2">
        <label for='time'>
        time:
        </label>
    </div>
	<div class="col-md-10 col-sm-10">
    	<input type="text" id="time" name="time" class="form-control" value="{{ $blogs['time'] }}" />
    </div>
</div>
<br />  

<div class="row">
	<div class="col-md-2 col-sm-2">
        <label for='day'>
        day:
        </label>
    </div>
	<div class="col-md-10 col-sm-10">
    	<input type="text" id="day" name="day" class="form-control" value="{{ $blogs['day'] }}" />
    </div>
</div>
<br />  
<div class="row">
	<div class="col-md-12 col-sm-12">
    	<input type="submit" id="submit" name="submit" value="Submit" class="form-control btn btn-info"/>
    </div>
</div>  
</form>
</div>
@endif

@endsection
@section('foot')
    @parent
@endsection