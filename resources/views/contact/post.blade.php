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
	<h3>Contact Information</h3>
    <hr />

    <table width="80%" border="1" class="table table-striped">
        <tr>
            <td>Email</td>
            <td>Subject</td>
            <td>Description</td>
            <td>Action</td>
            
        </tr>
        @foreach($blogs as $blog)
        <tr>
           <td>{{$blog['email']}}</td>
            <td>{{$blog['subject']}}</td>
            <td>{{$blog['description']}}</td>
            <td>
            @if(Auth::user()->type==3 || Auth::user()->type==2)

   <form action="{{ route('contact.destroy', $blog['id']) }}" method="get">
            
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>               
            @endif
             | <a href="{{action('ContactsController@show', $blog['id'])}}">View</a></td>
        </tr>    
        
        @endforeach
    </table>
    
</div>
@endif
@endsection
@section('foot')
    @parent

@endsection