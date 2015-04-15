@extends('layouts.default')
@section('content')

<div class="container"> 
  <div class="row">
    <div class="col-md-12">
    <h2 style="color:#79C33A">User Bookings</h2>
   	<?php if(Session::get('created',NULL)!=NULL): ?>		
-   	<div class="alert alert-success" role="alert">		
-        	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>		
-        	<span class="sr-only">Message:</span>		
-        	{{$created}}		
-    	</div>		
-   <?php endif; ?>
    {{ $table->render() }}
    {{ $table->script() }}
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
    <h2 style="color:#79C33A">Branch Bookings</h2>
    <hr class="divider">
    {{ $table2->render() }}
    {{ $table2->script() }}
    </div>
  </div>
</div>
@stop
