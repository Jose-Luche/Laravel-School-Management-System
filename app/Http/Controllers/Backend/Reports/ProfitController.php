<?php

namespace App\Http\Controllers\Backend\Reports;

use App\Http\Controllers\Controller;
use App\Models\AccountEmpSalary;
use App\Models\AccountStudentFee;
use App\Models\OtherCosts;
use Illuminate\Http\Request;
use PDF;

class ProfitController extends Controller
{
    public function MonthlyProfitView()
    {
        return view('backend.reports.profit.profit_view');
    }

    public function MonthlyProfitDateWise(Request $request)
    {
        $start_date = date('Y-m', strtotime($request->start_date));
        $end_date = date('Y-m', strtotime($request->end_date));
        $sdate = date('Y-m-d', strtotime($request->start_date));
        $edate = date('Y-m-d', strtotime($request->end_date));


        $student_fee = AccountStudentFee::whereBetween('date', [$start_date, $end_date])->sum('amount');
        $other_costs = OtherCosts::whereBetween('date', [$sdate, $edate])->sum('amount');
        $emp_salary = AccountEmpSalary::whereBetween('date', [$start_date, $end_date])->sum('amount');

        $total_cost = $other_costs + $emp_salary;
        $profit = $student_fee - $total_cost;

        $html['thsource'] = '<th>Student Fee</th>';
        $html['thsource'] .= '<th>Other Costs</th>';
        $html['thsource'] .= '<th>Employee Salary</th>';
        $html['thsource'] .= '<th>Total Cost</th>';
        $html['thsource'] .= '<th>Profit</th>';
        $html['thsource'] .= '<th>Action</th>';

        $color = 'success';

        $html['tdsource'] = '<td>' . $student_fee . '</td>';
        $html['tdsource'] .= '<td>' . $other_costs . '</td>';
        $html['tdsource'] .= '<td>' . $emp_salary . '</td>';
        $html['tdsource'] .= '<td>' . $total_cost . '</td>';
        $html['tdsource'] .= '<td>' . $profit . '</td>';
        $html['tdsource'] .= '<td>';
        $html['tdsource'] .= '<a class="btn btn-sm btn-' . $color . '"
                    title = "PDF" target = "_blank" href="' . route(
            "reports.profit.pdf"
        ) . '?start_date=' . $sdate . '&end_date=' . $edate . '">Pay Slip</a>';
        $html['tdsource'] .= '</td>';
        return response()->json(@$html);
    }

    public function MonthlyProfitPdf(Request $request)
    {
        $data['start_date'] = date('Y-m', strtotime($request->start_date));
        $data['end_date'] = date('Y-m', strtotime($request->end_date));
        $data['sdate'] = date('Y-m-d', strtotime($request->start_date));
        $data['edate'] = date('Y-m-d', strtotime($request->end_date));

        $pdf = PDF::loadView('backend.reports.profit.profit_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
