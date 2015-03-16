@extends('layouts.default')
@section('content')
<div>
    <h2>View Kits</h2>
    <p><h4>This is where you can view information on the various kits in the system.
    <p>Things like contents, most recent booking date and branch, and any notes about the kit.
    <p>Simply select a kit type from the dropdown menu and hit 'See Kits' to bring up the info.</h4>
    
    {{Form::open()}}
        {{Form::select('Kit Type', array('Ipad', 'Lego Mindstorms'));}}
        /*{{Form::select('Kits', array());}} Fill this with the relevant kits from kit type */ 
        {{Form::submit('See Kits')}}
    {{Form::close()}}
    
    
</div>
@stop
