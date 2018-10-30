@extends('layouts.app')
@section('title', 'Joshim Blog')

@section('sidebar')
    @parent

    
@endsection

@section('content')
<div class="container">
<h3>Contact Us</h3>
<hr />
<form method="post" action="{{url('contact_store')}}">
  {{ csrf_field() }}     

 <div class="row form-group">
<div class="col-md-12 col-sm-10">
<label for="email">
Email:
</label>
</div>
<div class="row form-group">
<div class="col-md-12 col-sm-10">
<input type="text" class="form-control" id="email" name="email" />
</div>
</div>
</br>
    <div class="row form-group">
<div class="col-md-12 col-sm-10">
<label for="name">
Subject:
</label>
</div>
<div class="col-md-12 col-sm-10">
<input type="text" id="subject" name="subject" class="form-control" />
</div>
</div>
<div class="row form-group">
<div class="col-md-12 col-sm-12">
<label for="description">
Description:
</label>
</div>
<div class="col-md-12 col-sm-10">
<textarea id="description" name="description" class="form-control"></textarea>
	</div>
    </div>
    </br>


<div class="row">
	<div class="col-md-12 col-sm-12">
    <input type="submit" id="submit" name="submit" value="Submit" class="form-control btn btn-info"/>
    </div>
    	</div>
</form>
</div>
@endsection

@section('foot')
    @parent

@endsection