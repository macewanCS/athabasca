@extends('layouts.default')
@section('content')
<?php
$kittype = Null;
$kits;
?>
<div>
    <h2>View Kits</h2>
    <p><h4>This is where you can view information on the various kits in the system.
    <p>Things like contents, most recent booking date and branch, and any notes about the kit.
    <p>Simply select a kit type from the dropdown menu and hit 'See Kits' to bring up the info.</h4>
    
    {{Form::open(['url' => 'ViewKits'])}}
        {{Form::select('Kit Type', array('Ipad', 'Lego Mindstorms'));}}
        <!--{{Form::select('Kits', array());}} Fill this with the relevant kits from kit type 
        SO the issue is I can't redirect to this page with the selection in the form. I don't have any clue
        why it will not redirect properly. The problem is the 'url' => 'ViewKits', but I don't know how to tell
        it to make the page again as specified in the controller.-->
        {{Form::submit('See Kits')}}
    {{Form::close()}}
    
    <?php
    echo $kittype;
    $kits = DB::table('kitType');
    ?>
    <div class="container">           
    <table class="table table-hover">
        <thead>
          <tr>
          <th>Kit Name</th>
          <th>Recent Booking Date</th>
          <th>Branch ID</th>
          <th>Notes</th>
          </tr>
        </thead>
    
    
</div>
@stop
