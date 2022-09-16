<?php

namespace App\Http\Controllers\Backend\Reports;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendance;
use PDF;

class AttendanceReportController extends Controller
{
    public function AttendanceView()
    {
        $data['employees'] = User::where('usertype', 'employee')->get();
        return view('backend.reports.attendance_reports.attendance_view', $data);
    }

    public function AttendanceGet(Request $request)
    {
        $employee_id = $request->employee_id;
        if ($employee_id != '') {
            $where[] = ['employee_id', $employee_id];
        }

        $date = date('Y-m', strtotime($request->date));
        if ($date != '') {
            $where[] = ['date', 'like', $date . '%'];
        }

        $singleAttendance = EmployeeAttendance::with(['user'])->where($where)->get();
        if ($singleAttendance == true) {
            $data['allData'] = EmployeeAttendance::with(['user'])->where($where)->get();

            $data['absent'] = EmployeeAttendance::with(['user'])->where($where)->where('attend_status', 'Absent')->get()->count();

            $data['leave'] = EmployeeAttendance::with(['user'])->where($where)->where('attend_status', 'Leave')->get()->count();

            $data['month'] = date('m-Y', strtotime($request->date));

            $pdf = PDF::loadView('backend.reports.attendance_reports.attendance_report_pdf', $data);
            $pdf->SetProtection(['copy', 'print'], '', 'pass');
            return $pdf->stream('document.pdf');
        } else {
            $notification = array(
                'message' => 'Sorry!The Records do not match',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
