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
                <div class="panel-heading">User Information</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="post"  
action="{{ route('blog.user_update', $id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $blogs['name'] }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $blogs['email'] }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" value="{{ $blogs['password'] }}" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Status</label>

                            <div class="col-md-6">
                                <select id="status"  class="form-control" name="status" required>
                                <option value="{{ $blogs['status'] }}">
                                @if($blogs['status']==0)
                                Pending
                                @elseif($blogs['status']==1)
                                Active

                                @endif                                
                                
                                </option>
                                
                                
                                <option value="0">Pending</option>
                                <option value="1">Active</option>
                                </select>
                            </div>
                                                        
                        </div> 
                        <div class="form-group">
                            <label for="type" class="col-md-4 control-label">Type</label>                                                   
                            <div class="col-md-6">
                                <select id="type"  class="form-control" name="type" required>
                                <option value="
                                
                                {{ $blogs['type'] }}
                                
                                ">
                                @if($blogs['type']==0)
                                Guest
                                @elseif($blogs['type']==1)
                                Editor
                                @elseif($blogs['type']==2)
                                Admin 
                                @elseif($blogs['type']==3)                            		
                                Super Admin
                                @endif                                                                
                                </option>                                
                                <option value="0">Guest</option>
                                <option value="1">Editor</option>
                                <option value="2">Admin</option>
                                <option value="3">Super Admin</option>
                                
                                </select>
                            </div>                            
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update User
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endif
@endsection
@section('foot')
    @parent

@endsection