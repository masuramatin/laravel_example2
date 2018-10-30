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

	<h3>Show Teacher Details</h3>
    <hr />
	<div>
		Teacher Name: {{ $blogs['tname'] }}
    </div> 
    <hr /> 
    <div>
		Email : {{ $blogs['email'] }}
    </div> 
    <hr />
    <div>
		Mobile : {{ $blogs['mobile_no'] }}
    </div> 
    <hr />
    <div>
		University: {{ $blogs['university'] }}
    </div> 
    <hr />
    
	<div>
		Result : {{ $blogs['result'] }}
    </div> 
    <hr /> 
    
	<div>
		Subject : {{ $blogs['subject'] }}
    </div> 
    <hr /> 

	<div>
		Salary : {{ $blogs['salary'] }}
    </div> 
    <hr /> 

	<div>
		Time: {{ $blogs['time'] }}
    </div> 
    <hr /> 

	<div>
		Day: {{ $blogs['day'] }}
    </div> 
    <hr /> 

	<div>
		Area : {{ $blogs['area'] }}
    </div> 
    <hr /> 
	<!-- <div>
		Image : <img src="{{ url('/') }}/img/{{$blogs['name']}}" alt="Lights" height="100px" width="150px">
    </div> 
    <hr />  -->
              
</div>
</div>
@endif

@endsection
@section('foot')
    @parent

@endsection