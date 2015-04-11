@extends('layouts.default')
@section('content')

@if(isset($message))
<div class="alert alert-success" role="alert">
  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
  <span class="sr-only">Message:</span>
  {{$message->first()}}
</div> <!--end of error message -->
@endif

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 style="color:#DF115C">Kits</h2>
    {{ $table->render() }}
    {{ $table->script() }}
    <script type=\"text/javascript\">
    "defaultContent": ""
    </script>
    </div>
  </div>
</div>
@stop
