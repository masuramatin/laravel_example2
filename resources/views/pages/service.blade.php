@extends('layouts.app')
@section('title', 'Joshim Blog')

@section('sidebar')
    @parent

    
@endsection

@section('content')
<?php print $title; ?>
@endsection

@section('foot')
    @parent

@endsection