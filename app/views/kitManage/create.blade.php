@extends('layouts.default')

@section('content')

  @if(isset($message))
  <div class="alert alert-success" role="alert">
    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
    <span class="sr-only">Message:</span>
    {{$message->first()}}
  </div> <!--end of error message -->
  @endif
  <h3>Kit Creation: Step 1</h3>
  <hr class="divider">

  <h4>
  <div class = "dropdown">
    {{Form::open(['url' => 'kitmanage/create2']) }}
    I want to Create
    {{Form::label('kitType', 'Kit Of: ') }}
    {{Form::select('kitType', $kits) }}
    With this many
    <br>
    {{Form::label('assets', 'Assets (Eg. 7 ipads in kit): ') }}
    {{Form::number('assets', '1') }}
    {{Form::submit('Start Kit Creation') }}
    {{Form::close()}}
  </h4>
  <hr class="divider">

  </div>


@stop
