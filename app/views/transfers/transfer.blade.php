@extends('layouts.default')
@section('content')

  <div class="row">
    <div class="col-md-12">
      <h2 style="color:#7D408D">Your Outgoing transfers</h2>
    <hr class="divider">

    {{ $table->render() }}
    {{ $table->script() }}
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <h2 style="color:#7D408D">Your Incoming transfers</h2>
    <hr class="divider">

    {{ $table2->render() }}
    {{ $table2->script() }}
    </div>
  </div>

@stop
