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
		name : {{ $blogs['name'] }}
    </div> 
    <hr /> 
    
    
    <div>
		clocation : {{ $blogs['clocation'] }}
    </div> 
    <hr />
    
    
    
    <div>
		email : {{ $blogs['email'] }}
    </div> 
    <hr />
    
    
	<div>
		mobile : {{ $blogs['mobile'] }}
    </div> 
    <hr /> 
    <hr /> 
              
</div>
</div>
@endif

@endsection
@section('foot')
    @parent

@endsection