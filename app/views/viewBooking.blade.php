@extends('layouts.default')
@section('content')

<div class="container"> 
  <h3> EPL Bookings </h3> 
  <label for="branch">Branch:</label>
  <select onchange="showBranch(this.value)" class="form-control" id="branch">
    <option value="">Select a branch:</option>
    <option value="EPLABB">Abbottsfield - Penny McKee Branch</option>
    <option value="EPLCAL">Calder Branch</option>
    <option value="EPLCPL">Capilano Branch</option>
    <option value="EPLCSD">Castle Downs Branch</option>
    <option value="EPLCLV">Clareview Branch</option>
    <option value="EPLHIG">Highlands Branch</option>
    <option value="EPLIDY">Idylwylde Branch</option>
    <option value="EPLJPL">Jasper Place Branch</option>
    <option value="EPLLHL">Lois Hole Library</option>
    <option value="EPLLON">Londonderry Branch</option>
    <option value="EPLGMU">MacEwan University Lending Machine</option>
    <option value="EPLMEA">Meadows Branch</option>
    <option value="EPLMLW">Mill Woods Branch</option>
    <option value="EPLRIV">Riverbend Branch</option>
    <option value="EPLSPW">Sprucewood Branch</option>
    <option value="EPLMNA">Stanley A. Milner Library (Downtown)</option>
    <option value="EPLSTR">Strathcona Branch</option>
    <option value="EPLWMC">Whitemud Crossing Branch</option>
    <option value="EPLWOO">Woodcroft Branch</option>
  </select>
  <div class="row">
    <div class="col-md-12">
    <h3>Bookings</h3>
    {{ $table->render() }}
    {{ $table->script() }}
    </div>
  </div>
</div>
@stop