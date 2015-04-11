@extends('layouts.default')
@section('content')
<body>
<div id="login">
   <h1>Log In</h1>
   <p>
   {{Form::open(array('url' => 'login'))}}
   <div class ="row">
   <div class="col-md-3">
        {{Form::label('username','Username: ')}}
        {{Form::text('username',null, ['class' => 'form-control'])}}
      </div>
    </div>
    </div> <!--end row1 -->


    <div class ="row">
    <div class="col-md-3">
        <p>{{Form::label('password','Password: ')}}
        {{Form::password('password',['class' => 'form-control'])}}<p>
        </div>
      </div>
      </div> <!--end row1 -->

      <div>
        <p>{{Form::submit('Log Me In!')}}<p>
        {{Form::close()}}
    </div>
</div>
</body>
@stop
