@extends('layouts.default')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">           
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Kit Name</th>
        <th>Booking Start Date</th>
        <th>Booking End Date</th>
        <th>Branch ID</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>IPod Kits 1</td>
        <td>Jan 28, 2015</td>
        <td>Jan 30, 2015</td>
        <td>EPL</td>
      </tr>
      <tr>
        <td>IPod Kits 2</td>
        <td>Jan 28, 2015</td>
        <td>Jan 30, 2015</td>
        <td>EPL</td>
      </tr>
      <tr>
        <td>IPod Kits 3</td>
        <td>Jan 28, 2015</td>
        <td>Jan 30, 2015</td>
        <td>EPL</td>
      </tr>
    </tbody>
  </table>
</div>

</body>
</html>
@stop