@extends('layouts.default')
@section('content')
<h2 style="color:#DF115C">Kit Creation: Step 2</h2>
<hr class="divider">

  <div class = "jumbotron">
    <h3>Input Data Below to Complete Kit Creation</h3>
    <div>
      {{Form::open(['url' => 'kitmanage/create2add']) }}
      Creating Kit of Class:
      {{Form::label('kitType', 'Kit Type: ') }}
      {{Form::select('kitType', $kits, $kitInput, ['readonly'],['class' => 'form-control']) }}
      with this many
      {{Form::label('assets', 'Assets (Eg. 7 ipads in kit): ') }}
      {{Form::number('assets', $assets,['readonly'],['class' => 'form-control']) }}
    </div>
  </div> <!--End of jumbotron -->

  @if(isset($error))
  <div class="alert alert-danger" role="alert">
    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
    <span class="sr-only">Error:</span>
    {{$error;}}
  </div> <!--end of error message -->
  @endif

  <!-- DISPLAY ERROR IF ONE HERE -->
  <div class ="row">
  <div class="col-md-4">
    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
      {{Form::label('barcode', 'Kit Barcode') }}
      {{Form::text('barcode',null, ['class' => 'form-control']) }}
      {{$errors->first('barcode', '<p class="help-block">:message</p>') }}
    </div>
  </div>
  </div> <!--end row1 -->

  <div class ="row">
      @for($i = 0; $i < $assets; $i++)
      <div class="col-sm-3">
        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
          {{Form::label($i, 'Asset Tag  ')}}
          {{Form::text(($i), null, ['class' => 'form-control'])}}
          {{$errors->first($i, '<p class="help-block">:message</p>') }}
        </div>
      </div>
      @endfor
  </div> <!-- end row two -->

  <div class ="row">
    <div class="col-md-6">
    <input type="submit" name="add"  value="Add Asset">
    <input type="submit" name="sub"  value="Remove Last Asset">
  </div>
  </div>

  <div class ="row">
    <div class="col-md-4">
      <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
      {{Form::label('notes', 'Notes')}}
      {{Form::textarea('notes',null, ['class' => 'form-control', 'rows' => 2])}}
      {{$errors->first('notes', '<p class="help-block">:message</p>') }}
    </div>
  </div>
  </div>

  <div>
    {{Form::submit('Create Kit', ['class' =>  'createbook']) }}
    {{Form::close()}}
    <hr class="divider"></hr>
  </div>
  <hr class="divider"></hr>

@stop
