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
      <p><b>Student Exam Fee</b></p>
      </td>
    </tr>
</table>

@php
    $registrationfee = App\Models\FeeAmount::where('fee_category_id', '4')->where('student_class_id', $details->student_class_id)->first();
    $originalfee = $registrationfee->amount;
    $discount = $details['discount']['discount'];
    $discountablefee = $discount / 100 * $originalfee;
    $finalfee = (float)$originalfee - (float)$discountablefee;        
@endphp

<table id="customers">
  <tr>
    <th width="10%">SL</th>
    <th width="45%">Student Details</th>
    <th width="45%">Student Data</th>
    
  </tr>
  <tr>
    <td>1</td>
    <td>ID No</td>
    <td>{{ $details['student']['id_no'] }}</td>
  </tr>

  <tr>
    <td>2</td>
    <td>Role No:</td>
    <td>{{ $details->Role }}</td>
  </tr>

  
  <tr>
    <td>3</td>
    <td>Student Name</td>
    <td>{{ $details['student']['name'] }}</td>
  </tr>

  <tr>
    <td>5</td>
    <td>Session</td>
    <td>{{ $details['student_year']['name'] }}</td>
  </tr>

  <tr>
    <td>6</td>
    <td>Class</td>
    <td>{{ $details['student_class']['name'] }}</td>
  </tr>

  <tr>
    <td>7</td>
    <td>Exam Fee</td>
    <td>{{ $originalfee }} $</td>
  </tr>

  <tr>
    <td>8</td>
    <td>Discount Rate </td>
    <td>{{ $discount }} %</td>
  </tr>

  
  <tr>
    <td>9</td>
    <td>Discount Amount </td>
    <td>{{ $discountablefee }} $</td>
  </tr>

  <tr>
    <td>10</td>
    <td>Fees Payable for {{ $exam_type }}</td>
    <td>{{ $finalfee }} $</td> 
  </tr>

  
</table>

<br>
<i style="font-size: 10px; float: right;">Print Date: {{ date("d M Y")}}</i>

<hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">

<table id="customers">
  <tr>
    <th width="10%">SL</th>
    <th width="45%">Student Details</th>
    <th width="45%">Student Data</th>
    
  </tr>
  <tr>
    <td>1</td>
    <td>ID No</td>
    <td>{{ $details['student']['id_no'] }}</td>
  </tr>

  <tr>
    <td>2</td>
    <td>Role No:</td>
    <td>{{ $details->Role }}</td>
  </tr>

  
  <tr>
    <td>3</td>
    <td>Student Name</td>
    <td>{{ $details['student']['name'] }}</td>
  </tr>

  <tr>
    <td>5</td>
    <td>Session</td>
    <td>{{ $details['student_year']['name'] }}</td>
  </tr>

  <tr>
    <td>6</td>
    <td>Class</td>
    <td>{{ $details['student_class']['name'] }}</td>
  </tr>

  <tr>
    <td>7</td>
    <td>Exam Fee</td>
    <td>{{ $originalfee }}$</td>
  </tr>

  <tr>
    <td>8</td>
    <td>Discount Rate </td>
    <td>{{ $discount }}%</td>
  </tr>

  
  <tr>
    <td>9</td>
    <td>Discount Amount </td>
    <td>{{ $discountablefee }}$</td>
  </tr>

  <tr>
    <td>10</td>
    <td>Fees Payable for {{ $exam_type }}</td>
    <td>{{ $finalfee }}$</td> 
  </tr>

  
</table>

<br>
<i style="font-size: 10px; float: right;">Print Date: {{ date("d M Y")}}</i>
</body>
</html>