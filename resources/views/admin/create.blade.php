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
<h3>Add Blog Item</h3>
<hr />
<form method="post" action="{{url('store')}}" enctype="multipart/form-data">
  {{ csrf_field() }}     

<div class="row form-group">
	<div class="col-md-2 col-sm-2">
        <label for='category_id'>
        Category:
        </label>
    </div>
	<div class="col-md-10 col-sm-10">
    	<select id="category_id" name="category_id" 
        class="form-control">
        @foreach($blogs as $blog)
        	<option value="{{$blog['id']}}">{{$blog['cat_name']}}</option>
        @endforeach    
        </select>
    </div>
</div>   
<br /> 
<div class="row form-group">
	<div class="col-md-2 col-sm-2">
        <label for='subject'>
        Subject:
        </label>
    </div>
	<div class="col-md-10 col-sm-10">
    	<input type="text" id="subject" name="subject" class="form-control"/>
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
    	<textarea id="description" name="description" class="form-control"/></textarea>
    </div>
</div>
<br />  

<div class="row">
	<div class="col-md-2 col-sm-2">
        <label for='name'>
        Name:
        </label>
    </div>
	<div class="col-md-10 col-sm-10">
    	<input type="file" id="name" name="name" class="form-control"/>
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