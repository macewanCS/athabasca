@extends('layouts.default')
@section('content')
<body>
<div class="errors">{{Session::get('errors');}}</div>
<div id="login">
   <h1>Log In</h1>
   <p>
   {{Form::open(array('url' => 'login'))}}
   <div class ="row">
   <div class="col-md-3">
     <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
        {{Form::label('username','Username: ')}}
        {{Form::text('username',null, ['class' => 'form-control'])}}
        {{$errors->first('barcode', '<p class="help-block">:message</p>') }}
      </div>
    </div>
    </div> <!--end row1 -->


    <div class ="row">
    <div class="col-md-3">
      <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
        <p>{{Form::label('password','Password: ')}}
        {{Form::password('password',['class' => 'form-control'])}}<p>
        {{$errors->first('barcode', '<p class="help-block">:message</p>') }}
        </div>
      </div>
      </div> <!--end row1 -->


        <p>{{Form::submit('Log Me In!')}}<p>
        {{Form::close()}}
    </div>
</div>
</body>
@stop
