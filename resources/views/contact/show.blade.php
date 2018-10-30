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
		Email : {{ $blogs['email'] }}
    </div> 
    <hr /> 
	<div>
		Subject : {{ $blogs['subject'] }}
    </div> 
    <hr /> 
    
	<div>
		Description : {{ $blogs['description'] }}
    </div> 
    <hr /> 
              
</div>
</div>
@endsection
@section('foot')
    @parent

@endsection