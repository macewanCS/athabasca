@extends('layouts.default')
@section('content')
<?php
    $rec = Session::get('rec',NULL);
?>
  <div class = "jumbotron">
    <h2>Create a new kit by filling out the data below</h2>
    <p>All fields are required. You may hover over a field for more explanation</p>

  <div class = "dropdown">
    {{Form::open(['url' => 'kitmanage/create2add']) }}
    I want to Create a kit of

    with this many

  </div>
  </div>
  <div>
    {{Form::label('barcode', 'Kit Barcode')}}
    {{Form::text('barcode')}}
    {{Form::label('barcode', 'Kit Barcode')}}
    {{Form::text('barcode')}}
  </div>
    @for($i = 1; $i <= $rec; $i++)
      <div>
        {{Form::label($i, 'Asset Tag')}}
        {{Form::text($i)}}
      </div>
    @endfor
   <input type="submit" name="add"  value="Add Another Recipiant">
  <div>
    {{Form::label('notes', 'Notes')}}
    {{Form::textarea('notes')}}
    <input type="submit" name="create"  value="Create Booking">
    {{Form::close()}}
  </div>

</div>
@stop
