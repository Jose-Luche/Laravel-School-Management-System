<?php

namespace App\Http\Controllers\Backend\Account;

use Illuminate\Http\Request;
use App\Models\AccountEmpSalary;
use App\Models\EmployeeAttendance;
use App\Http\Controllers\Controller;

class AccountSalaryController extends Controller
{
    public function AccountSalaryView()
    {
        $data['allData'] = AccountEmpSalary::all();
        return view('backend.account.employee_salary.employee_salary_view', $data);
    }

    public function AccountSalaryAdd()
    {
        return view('backend.account.employee_salary.employee_salary_add');
    }

    public function GetEmployee(Request $request)
    {
        $date = date('Y-m', strtotime($request->date));

        if ($date != '') {
            $where[] = ['date', 'like', $date . '%'];
        }



        $data = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();

        $html['thsource'] = '<th>SL</th>';
        $html['thsource'] .= '<th>ID No</th>';
        $html['thsource'] .= '<th>Employee Name</th>';
        $html['thsource'] .= '<th>Basic Salary</th>';
        $html['thsource'] .= '<th>Salary This Month</th>';
        $html['thsource'] .= '<th>Select</th>';


        foreach ($data as $key => $v) {
            $account_salary = AccountEmpSalary::where('employee_id', $v->employee_id)->where('date', $date)->first();

            if ($account_salary != null) {
                $checked = 'checked';
            } else {
                $checked = '';
            }

            $totalattendance = EmployeeAttendance::with(['user'])->where($where)->where('employee_id', $v->employee_id)->get();

            $absentcount = count($totalattendance->where('attend_status', 'Absent'));




            $html[$key]['tdsource'] = '<td>' . ($key + 1) . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v['user']['id_no'] . '<input type="hidden" name="date"
            value="' . $date . '">' . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v['user']['name'] . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v['user']['salary'] . '</td>';


            $salary = (float)$v['user']['salary'];
            $daily_salary = (float)$salary / 30;
            $salary_deduction = (float)$absentcount * (float)$daily_salary;
            $gross_salary = (float)$salary - (float)$salary_deduction;

            $html[$key]['tdsource'] .= '<td>' . $gross_salary . '<input type="hidden" name="amount[]"
            value="' . $gross_salary . '">' . '</td>';

            $html[$key]['tdsource'] .= '<td>' . '<input type="hidden" name="employee_id[]" 
            value=" ' . $v->employee_id . '">' . '<input type="checkbox" name="checkmanage[]"
            id="' . $key . '" value="' . $key . '" ' . $checked . ' style="transform:scale(1.5);margin-left:10px;"> <label for="' . $key . '">
            </label> ' . '</td>';
        }
        return response()->json(@$html);
    }

    public function AccountSalaryStore(Request $request)
    {
        $date = date('Y-m', strtotime($request->date));

        AccountEmpSalary::where('date', $request->date)->delete();

        $checkdata = $request->checkmanage;
        if ($checkdata != null) {
            for ($i = 0; $i < count($checkdata); $i++) {
                $data = new AccountEmpSalary();
                $data->date = $date;
                $data->employee_id = $request->employee_id[$checkdata[$i]];
                $data->amount = $request->amount[$checkdata[$i]];

                $data->save();
            }
        }

        if (!empty(@$data) || empty($checkdata)) {

            $notification = array(
                'message' => 'Done! Data Inserted successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('account.salary.view')->with($notification);
        } else {
            $notification = array(
                'message' => 'Sorry! Data not saved',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    }
}
