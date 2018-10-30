@extends('layouts.app')
@section('title', 'Joshim Blog')

@section('sidebar')
    @parent

    
@endsection

@section('content')
<div class="container">
	<h3>About Us</h3>
    <hr />
	{{ $blogs['content'] }}
    <hr />
</div>
@endsection

@section('foot')
    @parent

@endsection