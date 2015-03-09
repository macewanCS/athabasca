@extends('layouts.default')
@section('content')
<?php
    $users = Session::get('userdata',NULL);
    if($users != NULL):
?>
<h2>Hello, <?= $users->username;?>
<p> Email: <?= $users->password;?> <p>
<?php  
    endif;
?>
@stop
