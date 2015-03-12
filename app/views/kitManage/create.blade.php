@extends('layouts.default')
@section('content')

  <div class = "jumbotron">
    <h2>Create a new kit by filling out the data below</h2>
    <p>All feilds are required. You may hover over a field for more explanation</p>
  </div>

  <div class = "dropdown">

    {{ Form::select('kitType', $kits , Input::old('kitType')) }}

  </div>

  <div>

  </div>


@stop
