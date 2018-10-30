@extends('layouts.app')
@section('title', 'Joshim Blog')
@section('sidebar')
    @parent
@endsection
@section('content')
<script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>
<div  class="container">
<!-- print button start -->
<div align="right" style="margin-top:-10px;margin-top:-10px;margin-right:50px;padding:0px;">
  <input type="button" value="print" onclick="PrintDiv();" 
  class="btn btn-success"
  />
</div>
<!-- print button end -->
<!-- print header start -->
        <div id="divToPrint">

	<h3>Show Blog Item Details</h3>
    <hr />
	<div>
		<b>Subject</b> : 
        <hr />
        {{ $blogs['subject'] }}
    </div> 
    <hr /> 
	<div>
		<b>Description</b> : 
        <hr />
        {{ $blogs['description'] }}
    </div> 
    <hr /> 
    
	<div>
		<b>Image</b> : 
        <br />
        <hr />
        <img src="{{ url('/') }}/img/{{$blogs['name']}}" alt="Lights" height="400px" width="450px">
    </div> 
    <hr /> 
    
<div class="container">
    <h3>Comments</h3>
<hr />
	@foreach($post as $pos)
    @if($pos->status==2)
    
    	<div>{{ $pos->description  }}</div>
        <div>Date: {{ $pos->created_at  }}</div>
        <hr />
        @endif
    
    @endforeach
</div>
<form method="post" action="{{url('details_store')}}">
{{ csrf_field() }}
    <div class="container">

        <div class="row" >
            <div class="col-md-12 col-sm-12">
         <input type="hidden" value="{{ $id }}" name="id" />
                <textarea id="description" name="description" class="form-control"/></textarea>
            </div>
        </div>
        <br />
        <div class="row">
        
            <div class="col-md-12 col-sm-12">
                <input type="submit" id="submit" name="submit" value="Submit" class="form-control btn btn-info"/>
            </div>
        </div>     
    </div>    
</form>
</div>
</div>
@endsection
@section('foot')
    @parent

@endsection