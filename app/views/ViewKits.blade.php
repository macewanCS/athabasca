@extends('layouts.default')
@section('content')
<div>
    <?php
    
    $categories = Category::list('title','id');
    
    {{Form::open()}}
        {{Form::select('Kit Type', $categories)}}
    {{Form::close()}}
    
</div>
@stop
