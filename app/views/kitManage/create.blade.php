@extends('layouts.default')
@section('content')

  <div class = "jumbotron">
    <h3>Create a new kit by filling out the data below</h3>
    <h5>All fields are required.</h5>

  <div class = "dropdown">
    {{Form::open(['url' => 'kitmanage/create2']) }}
    I want to Create a kit of
    {{Form::label('kitType', 'Kit Type: ') }}
    {{Form::select('kitType', $kits) }}
    with this many
    {{Form::label('assets', 'Assets (Eg. 7 ipads in kit): ') }}
    {{Form::number('assets', '1') }}
    {{Form::submit('Start Kit Creation') }}
    {{Form::close()}}
  </div>

  </div>


@stop
