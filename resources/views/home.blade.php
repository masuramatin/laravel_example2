    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-4 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">Recent Post</div>
            <div class="panel-body">
              <ul class="list-group">
               @foreach($results as $blog)
    			<li class="list-group-item">
                <a href="{{action('BlogsController@show', $blog->id)}}">{{$blog->subject}}</a>
                
                <a href="{{action('PagesController@comment_edit', $blog->id)}}" title="Add">
          			<span class="glyphicon glyphicon-plus"></span>
        		</a>                
                <a href="{{action('PagesController@comment_edit', $blog->id)}}" title="Edit">
          			<span class="glyphicon glyphicon-pencil"></span>
        		</a>
                <a href="{{ route('comment.destroy', $blog->id) }}" title="Remove">
          			<span class="glyphicon glyphicon-remove"></span>
        		</a> 
                <a href="{{ route('comment.destroy', $blog->id) }}">
          			<span class="glyphicon glyphicon-film" title="View"></span>
        		</a>                 
                </li>
                @endforeach 

  			 </ul>
            </div>
          </div>
      </div> 
      
      <div class="col-md-4 ">
          <div class="panel panel-default">
            <div class="panel-heading">Recent Comments</div>
            <div class="panel-body">
              <ul class="list-group">
               @foreach($comments as $blog)
    			<li class="list-group-item">
                <a href="{{action('PagesController@comment_display', $blog->id)}}">{{$blog->description}}</a>        
                <a href="{{action('PagesController@comment_edit', $blog->id)}}" title="Edit">
          			<span class="glyphicon glyphicon-pencil"></span>
        		</a>
                <a href="{{ route('comment.destroy', $blog->id) }}" title="Remove">
          			<span class="glyphicon glyphicon-remove"></span>
        		</a> 
                <a href="{{ route('comment.destroy', $blog->id) }}">
          			<span class="glyphicon glyphicon-film" title="View"></span>
        		</a>                               
                </li>
                @endforeach 

  			 </ul>
            </div>
          </div>
      </div>         
    </div>    
    <div class="row">
      <div class="col-md-4 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">Recent Enquiry</div>
            <div class="panel-body">
              <ul class="list-group">
               @foreach($contact as $blog)
    			<li class="list-group-item">
                <a href="{{action('ContactsController@show', $blog->id)}}">{{$blog->subject}}</a>
                
                <a href="{{action('PagesController@comment_edit', $blog->id)}}" title="Edit">
          			<span class="glyphicon glyphicon-pencil"></span>
        		</a>
                <a href="{{ route('comment.destroy', $blog->id) }}" title="Remove">
          			<span class="glyphicon glyphicon-remove"></span>
        		</a> 
                <a href="{{ route('comment.destroy', $blog->id) }}">
          			<span class="glyphicon glyphicon-film" title="View"></span>
        		</a>                 
                </li>
                @endforeach 

  			 </ul>
            </div>
          </div>
      </div>
      
      <div class="col-md-4 ">
          <div class="panel panel-default">
            <div class="panel-heading">Users</div>
            <div class="panel-body">
              <ul class="list-group">
               @foreach($users as $blog)
    			<li class="list-group-item">
                <a href="{{action('BlogsController@user_display', $blog->id)}}">{{$blog->name}}</a>
                <span style="padding-left:120px;">
                <a href="{{action('PagesController@comment_edit', $blog->id)}}" title="Add">
          			<span class="glyphicon glyphicon-plus"></span>
        		</a>                
                <a href="{{action('PagesController@comment_edit', $blog->id)}}" title="Edit">
          			<span class="glyphicon glyphicon-pencil"></span>
        		</a>
                <a href="{{ route('comment.destroy', $blog->id) }}" title="Remove">
          			<span class="glyphicon glyphicon-remove"></span>
        		</a> 
                <a href="{{ route('comment.destroy', $blog->id) }}">
          			<span class="glyphicon glyphicon-film" title="View"></span>
        		</a>
                </span>                 
                </li>
                @endforeach 

  			 </ul>
            </div>
          </div>
      </div>       
    </div>      
</div>
@endif
@endsection
