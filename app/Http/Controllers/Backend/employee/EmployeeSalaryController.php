<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmployeeSalaryLog;

class EmployeeSalaryController extends Controller
{
    public function SalaryView()
    {
        $data['allData'] = User::where('usertype', 'employee')->get();
        return view('backend.employee.emp_salary.emp_salary_view', $data);
    }

    public function SalaryInc($id)
    {
        $data['editData'] = User::find($id);
        return view('backend.employee.emp_salary.emp_salary_inc', $data);
    }

    public function SalaryStore(Request $request, $id)
    {
        $user = User::find($id);
        $previous_salary = $user->salary;
        $present_salary = (float)$previous_salary + (float)$request->increment_salary;
        $user->salary = $present_salary;

        $user->save();


        //Updating the salary and all entries being captured on the salary logs table
        $salaryData = new EmployeeSalaryLog();
        $salaryData->employee_id = $id; //join the user table with the salary log using the id relationship
        $salaryData->previous_salary = $previous_salary;
        $salaryData->increment_salary = $request->increment_salary;
        $salaryData->present_salary = $present_salary;
        $salaryData->effective_date = date('Y-m-d', strtotime($request->effective_date));

        $salaryData->save();

        $notification = array(
            'message' => 'Salary Increment successful',
            'alert-type' => 'success'
        );

        return redirect()->route('employee.salary.view')->with($notification);
    }

    public function SalaryDetails($id)
    {
        $data['details'] = User::find($id);
        $data['salary_log'] = EmployeeSalaryLog::where('employee_id', $data['details']->id)
            ->get();
        return view('backend.employee.emp_salary.emp_salary_details', $data);
    }
}
