@extends('layouts.default')
{{HTML::style(asset('css/logincss.css'))}}
@section('content')
<body>
<div id="login">
   <h1>Log In</h1>
   <p>
   {{Form::open(array('url' => 'login'))}}
        {{Form::label('username','Username: ')}}
        {{Form::text('username')}}
            
 
        <p>{{Form::label('password','Password: ')}}
        {{Form::password('password')}}<p>
        

        <p>{{Form::submit('Log Me In!')}}<p>
        {{Form::close()}}
    </div>
</div>
</body>
@stop
