@extends('layouts.default')
@section('content')

<div class="container"> 
  <div class="row">
    <div class="col-md-12">
    <h3>Bookings</h3>
    {{ $table->render() }}
    {{ $table->script() }}
    </div>
  </div>
</div>
@stop