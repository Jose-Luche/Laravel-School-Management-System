<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>



<table id="customers">
    <tr>
      <td>
        <h2>
            <?php $image_path = '/upload/logo.png'; ?>
            <img src="{{ public_path() .$image_path }}" width="200" height="100">
        </h2>
      </td>
      <td><h2>School ERP</h2>
      <p>School Address: 71543 Juja</p>
      <p>Phone: 0727272727</p>
      <p>Email:support@sms.com</p>
      <p><b>Student Result Report</b></p>
      </td>
    </tr>
</table>
<br>
<br>



@foreach ($allData as $value)
    <table id="customers">

        <tr>
            <td>Image</td>
            <td>Easy School</td>
            <td>Student ID Card</td>
        </tr>

        <tr>
            <td>Name : {{ $value['student']['name']}}</td>
            <td>Session: {{ $value['student_year']['name']}}</td>
            <td>Class: {{ $value['student_class']['name']}} </td>
        </tr>

        <tr>
            <td>Role: {{ $value->role }} </td>
            <td>ID No: {{ $value['student']['id_no']}}</td>
            <td>Mobile Number: {{ $value['student']['mobile']}}</td>
        </tr>
    
    </table>
@endforeach




<br>
<i style="font-size: 10px; float: right;">Print Date: {{ date("d M Y")}}</i>

<hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">



<br>

</body>
</html>