@extends('layouts.default')
@section('content')
<?php
    $users = Session::get('userdata',NULL);
    $value2 = Input::get('to');
    $value = Input::get('from');
    if($users != NULL):
?>
<h2>Hello, <?= $users->username;?>
<p> Email: <?= $users->password;?> <p>
<?php 
    endif;
?>
<p> Value1: <?= $value[3], $value[4];?>
<p> Value2: <?= $value2;?>
@stop
