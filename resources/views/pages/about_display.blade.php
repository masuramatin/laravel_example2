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
	<h3>About Us</h3>
    <hr />
    <form action="{{ route('post.update', 1)}}" method="post">
<input type="hidden" name="_token" 
value="{{ csrf_token() }}"> 	
<textarea rows="10" cols="149"  id="content" name="content" class="form-control">{{ $blogs['content'] }}</textarea>
    <br />
    
                @if(Auth::user()->type==3 || Auth::user()->type==2)


    	<input type="submit" id="submit" name="submit" value="Edit About Us Information" class="form-control btn btn-info"
        
        />  
        		@else
    	<input type="submit" id="submit" name="submit" value="Edit About Us Information" class="form-control btn btn-info"
        disabled
        />  
        @endif              
        
          </form>
    <hr />
</div>
@endif
@endsection

@section('foot')
    @parent

@endsection