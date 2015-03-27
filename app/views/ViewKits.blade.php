@extends('layouts.default')
@section('content')

<div class="container">           
  <div class="row">
    <div class="col-md-12">
    <h3>Kits</h3>
    {{ $table->render() }}
    {{ $table->script() }}
    <script type=\"text/javascript\">
    "defaultContent": ""
    </script>
    </div>
  </div>
</div>
@stop
