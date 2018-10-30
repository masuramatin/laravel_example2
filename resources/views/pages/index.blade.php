 
@extends('layouts.app')

@section('title', 'Joshim Blog')

@section('sidebar')
    @parent

    
@endsection

@section('content')
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> <!-- end .flash-message -->
<div class="container">
<style>
img {
    float: right;
}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	 $("#search_bl").keyup(function(){
		 $value=$(this).val();
		 
		 $.ajax({
			type : 'get',
			url : '{{URL::to("search_rs_front")}}',
			data:{'search':$value},
			success:function(data){
				$("#con").hide();
				$('#search_result_bl').html(data);
				}
		});	 
	 });	 
});	
</script>
<body>
    <hr />
<div class="row" >    
<div class="col-md-6 col-sm-6" > 
<input type="text" class="form-control" id="search_bl" name="search_bl" placeholder="Search using blog subject">
</div> 
</div>   

<div id="search_result_bl"></div>
<br />

<div id="category">
@foreach($caty as $blog)

<a href="{{action('PagesController@cat_show', $blog['id'])}}"><button type="button" class="btn btn-success">{{ $blog['cat_name']  }}</button></a>
@endforeach
</div>
<div id='con'>

@foreach($title2 as $blog)
<hr />
<div>
<h1>{{$blog['subject']}}</h1>
<h5>Published At:<b>{{$blog['created_at']}}</b></h5>

<hr />
<p>
<div class="row">
	<div class="col-md-10 col-sm-10">
		{{ substr(strip_tags($blog['description']), 0, 500) }}		
    </div>         
	<div class="col-md-2 col-sm-2">
		<img src="{{ url('/') }}/img/{{$blog['name']}}" alt="Lights" height="100px" width="150px">
	</div>
</div>
</p>
</div>
<div><a href="{{action('PagesController@details', $blog['id'])}}">Read More....</a></div>

<hr />
@endforeach
{{ $title2->links()}} 
</div>

</div>
<?php //print $title; ?>
@endsection

@section('foot')
    @parent

@endsection