@extends('layouts.default')
@section('content')

<!DOCTYPE html>
<html>
<head>
<script>
function showBranch(str){
var xmlhttp;    
if (str==""){
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest){
  xmlhttp=new XMLHttpRequest();
  }
else{
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

xmlhttp.onreadystatechange=function(){
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getcustomer.asp?q="+str,true);
xmlhttp.send();
}
</script>
</head>
<body>
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
<div id="txtHint">Customer info will be listed here...</div>

</body>
</html>
@stop