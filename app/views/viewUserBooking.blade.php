@extends('layouts.default')
@section('content')

<div class="container"> 
  <div class="row">
    <div class="col-md-12">
    <h3>Users Bookings</h3>
    <?php if(Session::get('created',NULL)!=NULL): ?>
    <div class="alert alert-success" role="alert">
        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
        <span class="sr-only">Message:</span>
        {{$created}}
    </div>
   <?php endif; ?>
    {{ $table->render() }}
    {{ $table->script() }}
    </div>
  </div>
</div>
@stop
