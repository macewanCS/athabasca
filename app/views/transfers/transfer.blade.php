@extends('layouts.default')
@section('content')

  <div class="row">
    <div class="col-md-12">
    <h3>Your Outgoing transfers</h3>
    {{ $table->render() }}
    {{ $table->script() }}
    </div>
  </div>

@stop
