@extends('layouts.default')

@section('content')
  @if($errors->any())
  <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong> Important: </strong> {{$errors->first()}}.
  </div> <!--end of error message -->
  @endif
  <h2 style="color:#DF115C">Edit Kit Information<h2>
  <h3>Kit Named: {{$kitinfo->name}}</h3>
  <h3>Kit Barcode: {{$kitinfo->barcode}}</h3>
  <h3>Kit Type: {{$kitinfo->kitType}}</h3>
  <h3>Kit Has {{$kitinfo->assets}} assets.</h3>

  @for($i = 0; $i < $kitinfo->assets; $i++)
    <b>Name:</b> {{$assets[$i]}}
    <b>Tag:</b> {{$assettag[$i]}}
    <br>
  @endfor
  <br>
  {{Form::open(['url' => 'viewkit/'.$kitinfo->barcode.'/edit2']) }}
    <div class ="row">
      <div class="col-md-4">
        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
        {{Form::label('notes', 'Notes: (If Any)')}}
        {{Form::textarea('notes',$kitinfo->notes, ['class' => 'form-control', 'rows' => 2])}}
        {{$errors->first('notes', '<p class="help-block">:message</p>') }}
      </div>
    </div>
    </div>

    <div class ="row">
      <div class="col-md-6">
      <input type="submit" name="savenotes"  value="Save New Notes">
    </div>
    </div>
    <br>

    @if($kitinfo->damaged == null)
      <h3>Kit is not damaged</h3>
        <div class ="row">
          <div class="col-md-6">
          <input type="submit" name="report"  value="Report Damage">
        </div>
        </div>
        <br>

    @elseif($kitinfo->damaged == 'Yes')
    <div class ="row">
      <div class="col-md-4">

        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
        {{Form::label('damage', 'Damage Description')}}
        {{Form::textarea('damage',$kitinfo->damageDescription, ['class' => 'form-control', 'rows' => 2])}}
        {{$errors->first('damage', '<p class="help-block">:message</p>') }}
        <input type="submit" name="senddesc"  value="Save Damage Description">
        <input type="submit" name="unreport"  value="Kit Has been Fixed">

      </div>
    </div>
    </div>
    @endif
    {{Form::close()}}


@stop
