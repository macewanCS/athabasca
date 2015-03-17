@extends('layouts.default')
@section('content')

  <div class = "jumbotron">
    <h3>Create a new kit by filling out the data below</h3>
    <h5>All fields are required.</h5>

  <div class = "dropdown">
    {{Form::open(['url' => 'kitmanage/create2add']) }}
    Creating Kit of Class:
    {{Form::label('kitType', 'Kit Type: ') }}
    {{Form::select('kitType', $kits, $kitInput) }}
    with this many
    {{Form::label('assets', 'Assets (Eg. 7 ipads in kit): ') }}
    {{Form::number('assets', $assets) }}
  </div>
  </div>
  <div>
    {{Form::label('barcode', 'Kit Barcode')}}
    {{Form::text('barcode')}}
    {{Form::label('barcode', 'Kit Barcode')}}
    {{Form::text('barcode')}}
  </div>
    @for($i = 0; $i < $assets; $i++)
      <div>
        {{Form::label($i, 'Asset Tag  ')}}
        {{Form::text($i)}}
      </div>
    @endfor
    <input type="submit" name="add"  value="Add Another Assets">
  <div>
    {{Form::label('notes', 'Notes')}}
    {{Form::textarea('notes',null,['size' => '50x3'])}}
    {{Form::submit('Create Kit') }}
    {{Form::close()}}
  </div>

</div>
@stop
