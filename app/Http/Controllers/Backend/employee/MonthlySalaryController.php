<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendance;
use Illuminate\Http\Request;
use PDF;

class MonthlySalaryController extends Controller
{
    public function MonthlySalaryView()
    {
        return view('backend.employee.monthly_salary.view_monthly_salary');
    }

    public function MonthlySalaryGet(Request $request)
    {

        $date = date('Y-m', strtotime($request->date));

        if ($date != '') {
            $where[] = ['date', 'like', $date . '%'];
        }



        $data = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();

        $html['thsource'] = '<th>SL</th>';
        $html['thsource'] .= '<th>Employee Name</th>';
        $html['thsource'] .= '<th>Basic Salary</th>';
        $html['thsource'] .= '<th>Gross Salary</th>';
        $html['thsource'] .= '<th>Action</th>';


        foreach ($data as $key => $v) {
            $totalattendance = EmployeeAttendance::with(['user'])->where($where)->where('employee_id', $v->employee_id)->get();

            $absentcount = count($totalattendance->where('attend_status', 'Absent'));


            $color = 'success';

            $html[$key]['tdsource'] = '<td>' . ($key + 1) . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v['user']['name'] . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v['user']['salary'] . '</td>';


            $salary = (float)$v['user']['salary'];
            $daily_salary = (float)$salary / 30;
            $salary_deduction = (float)$absentcount * (float)$daily_salary;
            $gross_salary = (float)$salary - (float)$salary_deduction;

            $html[$key]['tdsource'] .= '<td>' . $gross_salary . '$' . '</td>';
            $html[$key]['tdsource'] .= '<td>';
            $html[$key]['tdsource'] .= '<a class="btn btn-sm btn-' . $color . '"
                title = "Payslip" target = "_blank" href="' . route(
                "employee.monthly.salary.payslip",
                $v->employee_id
            ) . '">Pay Slip</a>';
            $html[$key]['tdsource'] .= '</td>';
        }
        return response()->json(@$html);
    }

    public function MonthlySalaryPayslip(Request $request, $employee_id)
    {
        $id = EmployeeAttendance::where('employee_id', $employee_id)->first();
        $date = date('Y-m', strtotime($id->date));

        if ($date != '') {
            $where[] = ['date', 'like', $date . '%'];
        }

        $data['details'] = EmployeeAttendance::with(['user'])->where($where)->where('employee_id', $id->employee_id)->get();



        $pdf = PDF::loadView('backend.employee.monthly_salary.monthly_salary_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
