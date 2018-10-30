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
action="{{ route('blog.comment_update', $id) }}" enctype="multipart/form-data" >
<input type="hidden" name="_token" 
value="{{ csrf_token() }}"> 

<div class="row form-group">
	<div class="col-md-2 col-sm-2">
        <label for='subject'>
        User ID:
        </label>
    </div>
	<div class="col-md-10 col-sm-10">
    	<input type="text" id="userid" name="userid" class="form-control" value="{{ $blogs['userid'] }}" />
    </div>
</div>   
<br />  
<div class="row" >
	<div class="col-md-2 col-sm-2">
        <label for='subject'>
        Description:
        </label>
    </div>
    
	<div class="col-md-10 col-sm-10">
    	<textarea id="description" name="description" class="form-control"/>{{ $blogs['description'] }}</textarea>
    </div>
</div>
<br />  

<div class="row">
	<div class="col-md-2 col-sm-2">
        <label for='name'>
        Post ID:
        </label>
    </div>
	<div class="col-md-10 col-sm-10">
    	<input type="text" id="post_id" name="post_id" class="form-control" value="{{ $blogs['post_id'] }}" />
     
    </div>
</div>
<br />  

<div class="row">
	<div class="col-md-2 col-sm-2">
        <label for='name'>
        Status:
        </label>
    </div>
	<div class="col-md-10 col-sm-10">
    <select id="status" name="status" class="form-control">
    	<option value="{{ $blogs['status'] }}">
        @if($blogs['status']==2)
        	Approved
        @else
        	Pending
        @endif
        </option>
    	<option value="2">Approved</option>
    	<option value="1">Pending</option>
        
    </select>

     
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