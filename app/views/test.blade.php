@extends('layouts.default')
@section('content')
{{ date('m/d/Y h:i:s a')}}
<hr class="divider">

<?php
    $today = new DateTime();
    $date = $today->format('m/d/Y');
	$book = DB::table('booking')->where('datein','=',$date)->first();/*Change the date to today's wth $date*/
	$transfer = DB::table('booking')->where('transferout','=',$date)->first();
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
        ?>
            <h4>There are no bookings coming in today</h4>
        <?php
        else:
            $type = DB::table('kits')->where('barcode','=',$book->kitBarcode)->first();
        ?>
            <h4> There is a(n) <?=$type->kitType?> kit coming in for <?=$book->eventname?> today </h4>
            <a href="/viewuserbooking/show"><h5>Go see all bookings</h5></a>
        <?php
        endif;

        if($transfer == Null):
        ?>
            <h4>There are no transfers that need to ship out today</h4>
        <?php
        else:
            $type = DB::table('kits')->where('barcode','=',$book->kitBarcode)->first();
        ?>
            <h4> There is a(n) <?=$type->kitType?> kit going to <?=$transfer->forBranch?> that needs to be shipped out today </h4>
            <a href="/transfers"><h5>Go see all transfers</h5></a>
        <?php
        endif;
    endif;
?>
<hr class="divider">

@stop
