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
	<h3>Dashboard</h3>
    <hr />

    <table width="80%" border="1" class="table table-striped">
        <tr>
            <td>User ID</td>
            <td>Post ID</td>
            <td>Description</td>
            <td>Status</td>
            
            <td>Action</td>
            
        </tr>
        @foreach($blogs as $blog)
        <tr>
           <td>{{$blog['userid']}}</td>
            <td>{{$blog['post_id']}}</td>
            <td>{{$blog['description']}}</td>
            <td>        
            @if($blog['status']==2)
        		Approved
        	@else
        		Pending
        	@endif
            </td>
            
            <td>
                 @if(Auth::user()->type==3 || Auth::user()->type==2)
           
            <a href="{{action('PagesController@comment_edit', $blog['id'])}}">Edit</a> | 
            	@elseif(Auth::user()->type==3)
   <form action="{{ route('comment.destroy', $blog['id']) }}" method="get">
            
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>    
          		@endif           
            
             | <a href="">View</a></td>
        </tr>    
        
        @endforeach
    </table>
    {{ $blogs->links()}} 
</div>
@endif

@endsection
@section('foot')
    @parent

@endsection