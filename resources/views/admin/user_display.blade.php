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
	<h3>User Information</h3>
    <hr />

    <table width="80%" border="1" class="table table-striped">
        <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Type</td>
            <td>Status</td>
            
            <td>Action</td>
            
        </tr>
        @foreach($blogs as $blog)
        <tr>
           <td>{{$blog['name']}}</td>
            <td>{{$blog['email']}}</td>
            <td>
                @if($blog['type']==0)
                Guest
                @elseif($blog['type']==1)
                Editor
                @elseif($blog['type']==2)
                Admin 
                @elseif($blog['type']==3)                            		
                Super Admin
                @else
                nothing
                @endif
            </td>
            <td>
                @if($blog['status']==0)
                Pending
                @elseif($blog['status']==1)
                Active

                @endif             
            
            </td>
            
            <td>
                    @if(Auth::user()->type==3)
         
   <form action="" method="get">
            
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>               
            
             | <a href="{{action('BlogsController@user_edit', $blog['id'])}}">Edit</a>
             @endif
             </td>
        </tr>    
        
        @endforeach
    </table>
    
</div>
@endif
@endsection
@section('foot')
    @parent

@endsection