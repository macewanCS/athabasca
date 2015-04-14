@extends('layouts.default')

@section('content')

  @if(isset($message))
  <div class="alert alert-success" role="alert">
    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
    <span class="sr-only">Message:</span>
    {{$message->first()}}
  </div> <!--end of error message -->
  @endif
  <h2 style="color:#DF115C">Kit Creation: Step 1</h2>
  <hr class="divider">

  <div class = "dropdown">
    {{Form::open(['url' => 'kitmanage/create2']) }}
    I want to Create
    {{Form::label('kitType', 'Kit Of: ') }}
    {{Form::select('kitType', $kits) }}
    With this many
    {{Form::label('assets', 'Assets (Eg. 7 ipads in kit): ') }}
    {{Form::number('assets', '1') }}
    <hr class="divider">

    {{Form::submit('Start Kit Creation', ['class' => 'createbook'])}}
    {{Form::close()}}
  <hr class="divider">

  </div>


@stop
