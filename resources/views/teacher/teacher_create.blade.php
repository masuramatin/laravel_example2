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
<form method="post" action="{{url('teacher_store')}}">
  {{ csrf_field() }}     

<div class="row">
	<div class="col-md-2 col-sm-2">
        <label for='name'>
          Teacher Name:
        </label>
    </div>
	<div class="col-md-10 col-sm-10">
    	<input type="text" id="tname" name="tname" class="form-control"/>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-2 col-sm-2">
        <label for='email'>
            Email:
        </label>
    </div>
    <div class="col-md-10 col-sm-10">
        <input type="email" id="email" name="email" class="form-control"/>
    </div>
</div>
<br>

<div class="row">
    <div class="col-md-2 col-sm-2">
        <label for='mobile_no'>
        Mobile Number:
        </label>
    </div>
    <div class="col-md-10 col-sm-10">
        <input type="text" id="mobile_no" name="mobile_no" class="form-control"/>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-2 col-sm-2">
        <label for='university'>
          University:
        </label>
    </div>
    <div class="col-md-10 col-sm-10">
        <input type="text" id="university" name="university" class="form-control"/>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-2 col-sm-2">
        <label for='result'>
          Result
        </label>
    </div>
    <div class="col-md-10 col-sm-10">
        <input type="text" id="result" name="result" class="form-control"/>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-2 col-sm-2">
        <label for='subject'>
           Subject
        </label>
    </div>
    <div class="col-md-10 col-sm-10">
        <input type="text" id="subject" name="subject" class="form-control"/>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-2 col-sm-2">
        <label for='salary'>
           Salary
        </label>
    </div>
    <div class="col-md-10 col-sm-10">
        <input type="text" id="salary" name="salary" class="form-control"/>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-2 col-sm-2">
        <label for='time'>
           Time:
        </label>
    </div>
    <div class="col-md-10 col-sm-10">
        <input type="text" id="time" name="time" class="form-control"/>
    </div>
</div>
<br>

<div class="row">
    <div class="col-md-2 col-sm-2">
        <label for='day '>
          Day 
        </label>
    </div>
    <div class="col-md-10 col-sm-10">
        <input type="text" id="day" name="day" class="form-control"/>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-2 col-sm-2">
        <label for='area'>
          Area
        </label>
    </div>
    <div class="col-md-10 col-sm-10">
        <input type="text" id="area" name="area" class="form-control"/>
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