@extends('layouts.default')
@section('content')

<div class="container"> 
<header id="header" class="" style="centeralign">Edit Booking</header>
        <p>Booking ID: {{$data->bookingID}}</p>
        <p>Primary User: {{$data->primaryUser}}</p>
        <p>Event Name: {{$data->eventname}}</p>
        <p>Kit Barcode: {{$data->kitBarcode}}</p>
        <p>Branch: {{$data->forBranch}}</p>
        <p>Start Date: {{$data->datein}}</p>
        <p>End Date: {{$data->dateout}}</p>
        <p>Transfer in Day: {{$data->transferin}}</p>
        <p>Transfer out Day: {{$data->transferout}}</p>
</div>
@stop