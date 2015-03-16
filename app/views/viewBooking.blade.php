@extends('layouts.default')
@section('content')


<div class="container"> 
  <h3> EPL Bookings </h3> 
  <label for="branch">Branch:</label>
  <select class="form-control" id="branch">
    <option>EPL</option>
    <option>Macewan</option>
    <option>UofA</option>
    <option>Century</option>
  </select>
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