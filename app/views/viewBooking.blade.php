@extends('layouts.default')
@section('content')

<div class="container"> 
  <div class="row">
    <div class="col-md-12">
    	<h2 style="color:#79C33A">All Bookings</h2>
    {{ $table->render() }}
    {{ $table->script() }}
    </div>
  </div>
</div>
@stop