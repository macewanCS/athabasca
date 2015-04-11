@extends('layouts.default')
@section('content')
<body>
<div id="login">
   <h1>Log In</h1>
   <?php if(Session::get('errors',NULL)!=NULL): ?>
   <div class="alert alert-warning" role="alert">
    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
    <span class="sr-only">Message:</span>
    {{$errors}}
   </div>
   <?php endif; ?>
   
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
      </div> <!--end row1 -->


        <p>{{Form::submit('Log Me In!')}}<p>
        {{Form::close()}}
    </div>
</div>
</body>
@stop
