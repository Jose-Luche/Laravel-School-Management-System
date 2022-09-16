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
      </td>
    </tr>
</table>

@php
    $student_fee = App\Models\AccountStudentFee::whereBetween('date', [$start_date, $end_date])->sum('amount');
    $other_costs = App\Models\OtherCosts::whereBetween('date', [$sdate, $edate])->sum('amount');
    $emp_salary = App\Models\AccountEmpSalary::whereBetween('date', [$start_date, $end_date])->sum('amount');

    $total_cost = $other_costs + $emp_salary;
    $profit = $student_fee - $total_cost;

@endphp

<table id="customers">
  <tr>
    <td colspan="2" style="text-align: center;">
        <h4>Reporting Date: {{ date('d M Y',strtotime($sdate))}} - {{ date('d M Y',strtotime($edate))}}</h4>
    </td>
    
  </tr>
  <tr>
    <td width="50%"><h4></h4><b>Purpose</b></td>
    <td width="50%"><h4></h4><b>Amount</b></td>
    
  </tr>

  <tr>
    <td>Student Fees</td>
    <td>{{ $student_fee }}</td>
    
  </tr>

  
  <tr>
    <td>Employee Salary</td>
    <td>{{ $emp_salary }}</td>
    
  </tr>

  <tr>
    <td>Other Costs</td>
    <td>{{ $other_costs }}</td>
    
  </tr>

  <tr>
    <td>Total Cost</td>
    <td>{{ $total_cost }}</td>
    
  </tr>

  <tr>
    <td>Profit</td>
    <td>{{ $profit }}</td>
    
  </tr>
 
</table>



<br>
<i style="font-size: 10px; float: right;">Print Date: {{ date("d M Y")}}</i>

<hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">



<br>
<i style="font-size: 10px; float: right;">Print Date: {{ date("d M Y")}}</i>
</body>
</html>