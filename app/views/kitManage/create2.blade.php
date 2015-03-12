@extends('layouts.default')
@section('content')

  <div class = "jumbotron">
    <h2>Create a new kit by filling out the data below</h2>
    <p>All fields are required. You may hover over a field for more explanation</p>

  <div class = "dropdown">
    {{Form::open(['url' => 'kitmanage/create2']) }}
    I want to Create a kit of
    {{Form::label('kitType', 'Kit Type: ') }}
    {{Form::select('kitType', $kits, $kitInput,['disabled']) }}
    with this many
    {{Form::label('assets', 'Assets (Eg. 7 ipads in kit): ') }}
    {{Form::number('assets', $assets,['disabled']) }}
  </div>
  </div>
  <div>
    {{Form::label('barcode', 'Kit Barcode')}}
    {{Form::text('barcode')}}
    {{Form::label('barcode', 'Kit Barcode')}}
    {{Form::text('barcode')}}
  </div>
    @for($i = 0; $i <= $assets; $i++)
      <div>
        {{Form::label($i, 'Asset Tag')}}
        {{Form::text($i)}}
      </div>
    @endfor
  <div>
    {{Form::label('notes', 'Notes')}}
    {{Form::textarea('notes')}}
    {{Form::submit('Create Kit') }}
    {{Form::close()}}
  </div>

</div>
@stop
