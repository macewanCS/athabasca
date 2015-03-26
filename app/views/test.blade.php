@extends('layouts.default')
@section('content')
<?php
    $today = new DateTime();
    $date = $today->format('m/d/Y');
    date_sub($today, date_interval_create_from_date_string('1 day'));
	$book = DB::table('booking')->where('datein','=','03/31/2015')->first();/*Change the date to today's wth $date*/
	$transfer = DB::table('booking')->where('transferout','=','04/01/2015')->first();
    $users = Session::get('userdata',NULL);
    if($users != NULL):
        ?>
        <h2>Hello, <?= $users->username;?></h2>
        <?php
        $date = $today->format('l, F j,Y');
        ?>
        <h3> Today is <?=$date?></h3>
        <?php
        if($book == Null):
            echo("There are no bookings coming in today");
        else:
            $type = DB::table('kits')->where('barcode','=',$book->kitBarcode)->first();
        ?>
            <h4> There is a(n) <?=$type->kitType?> kit coming in for <?=$book->eventname?> today </h4>
            <a href="/viewbooking"><h5>Go see all bookings</h5></a>
        <?php
        endif;
        
        if($transfer == Null && $book != $transfer):
            echo("There are no transfers that need to ship out today");
        else:
            $type = DB::table('kits')->where('barcode','=',$book->kitBarcode)->first();
        ?>
            <h4> There is a(n) <?=$type->kitType?> kit going to <?=$transfer->forBranch?> that needs to be shipped out today </h4>
            <a href="/transfers"><h5>Go see all transfers</h5></a>
        <?php
        endif;
    endif;
?>

@stop
