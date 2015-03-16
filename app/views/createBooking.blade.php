@extends('layouts.default')
@section('content')
<?php
    $rec = Session::get('rec',NULL);
    $kits = DB::table('kitType')->lists('kitType');
?>
  <div class = "jumbotron">

    <h2>Select the Type of kit you want to Book(will default to Ipad Kit)</h2>
    {{Form::open(['url' => 'createbooking']) }}
    <p>{{Form::label('desKit', 'Select Kit Type: ')}}
    {{Form::select('desKit', $kits, $kit) }}</p>
    <input type="submit" name="kit"  value="Select Kit">

    
  </div>
  <div>
    {{Form::label('branch', 'Booking Location')}}
    {{Form::select('desBranch', $kits) }}
   </div>
    Start
    

    
    End
   <div>
    {{Form::label('barcode', 'Kit Barcode')}}
    {{Form::text('barcode')}}
  </div>
    @for($i = 1; $i <= $rec; $i++)
      <div>
        {{Form::label($i, 'Asset Tag')}}
        {{Form::text($i)}}
      </div>
    @endfor
   <input type="submit" name="add"  value="Add Another Recipiant">
  <div>
    {{Form::label('notes', 'Notes')}}
    {{Form::textarea('notes')}}
    <input type="submit" name="create"  value="Create Booking">
    {{Form::close()}}
  </div>

</div>
@stop
