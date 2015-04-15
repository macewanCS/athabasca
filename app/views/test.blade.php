@extends('layouts.default')
@section('content')
<hr class="divider">

@if(Session::get('errors',NULL)!=NULL)
   <div class="alert alert-warning" role="alert">
    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
    <span class="sr-only">Message:</span>
    {{$errors}}
   </div>
@endif

<?php
    $today = new DateTime();
    $date = $today->format('m/d/Y');
    $users = Session::get('userdata',NULL);
?>

<h2 style="color:#F6BC2A"> Hello {{$users->username}}, Today is {{$date}} </h2>
<hr class="divider">
<div class="row">
  <div class="col-md-12">
  <h2 style="color:#F6BC2A">Upcoming Transfers Leaving Your Branch</h2>
  {{ $table->render() }}
  {{ $table->script() }}
  </div>
</div>
<hr class="divider">

@stop
