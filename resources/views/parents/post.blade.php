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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	 $("#search_bl").keyup(function(){
		 $value=$(this).val();
		 //alert($value);
		 $.ajax({
			type : 'get',
			url : '{{URL::to("search_rs")}}',
			data:{'search':$value},
			success:function(data){
				$("#con").hide();
				$('#search_result_bl').html(data);
				}
		});	 
	 });	 
});	
</script>
<div class="container">
	<h3>Dashboard</h3>
    
    <hr />
<div class="row" >    
<div class="col-md-6 col-sm-6" > 
<input type="text" class="form-control" id="search_bl" name="search_bl" placeholder="Search using blog subject">
</div> 
</div>   
<br />
<div id="search_result_bl"></div>
<br />

<div id='con'>
    <div align="center" ><a href="{{action('ParentsController@parents_create')}}"><h4>Add Item</h4></a></div>
    <table width="90%" border="1" class="table table-striped">
        <tr>
            <td width="10%">Name</td>
            <td width="60%">Subject</td>
            <td width="10%">Qualification</td>
            <td width="20%">Action</td>
            
        </tr>
        @foreach($blogs as $blog)
        <tr>
           <td>{{$blog['name']}}</td>
            <td>{{$blog['subject']}}</td>
            <td>{{$blog['qualification']}}</td>
            <td>
            <table border=1>
            <tr> <td>
            @if(Auth::user()->type==3 || Auth::user()->type==2)
            <a href="{{action('ParentsController@parents_edit', $blog['id'])}}"  class="btn btn-warning">Edit</a>   </td>
            @endif
            @if(Auth::user()->type==3)
           <td>
   <form action="{{ route('blog.destroy', $blog['id']) }}" method="get">
   
   
            
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>  </td>              
            @endif
            <td>
              <a href="{{action('ParentsController@parents_show', $blog['id'])}}"  class="btn btn-info">View</a>
             </td>
             </tr>
             </table>
             </td>
        </tr>    
        
        @endforeach
    </table>
    {{ $blogs->links()}} 
    </div>
</div>
@endif
@endsection
@section('foot')
    @parent

@endsection