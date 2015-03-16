@extends('layouts.default')
@section('content')
<div>
    <h1>Pending Transfers</h1>
    <h2>Recieving Tranfers</h2>
    TransferController.show();
    <h2>Outgoing Transfers</h2>
    TransferController.show();
</div>
@stop
