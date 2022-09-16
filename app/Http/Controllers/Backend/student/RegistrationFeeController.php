<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;

use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\FeeAmount;
use App\Models\FeeCategory;
use Illuminate\Support\Facades\DB;

use PDF;

class RegistrationFeeController extends Controller
{
    public function RegFeeView()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        return view('backend.student.reg_fee.reg_fee_view', $data);
    }

    public function RegFeeClassWise(Request $request)
    {
        $year_id = $request->year_id;
        $student_class_id = $request->student_class_id;

        if ($year_id != '') {
            $where[] = ['year_id', 'like', $year_id . '%'];
        }

        if ($student_class_id != '') {
            $where[] = ['student_class_id', 'like', $student_class_id . '%'];
        }

        $allStudent = AssignStudent::with(['discount'])->where($where)->get();

        $html['thsource'] = '<th>SL</th>';
        $html['thsource'] .= '<th>ID No</th>';
        $html['thsource'] .= '<th>Student Name</th>';
        $html['thsource'] .= '<th>Role No</th>';
        $html['thsource'] .= '<th>Reg Fee</th>';
        $html['thsource'] .= '<th>Discount</th>';
        $html['thsource'] .= '<th>Student Fee</th>';
        $html['thsource'] .= '<th>Action</th>';

        foreach ($allStudent as $key => $v) {
            $registrationfee = FeeAmount::where('fee_category_id', '1')->where('student_class_id', $v->student_class_id)->first();
            $color = 'success';

            $html[$key]['tdsource'] = '<td>' . ($key + 1) . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v['student']['id_no'] . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v['student']['name'] . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v->Role . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $registrationfee->amount . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v['discount']['discount'] . '%' . '</td>';

            $originalfee = $registrationfee->amount;
            $discount = $v['discount']['discount'];
            $discountablefee = $discount / 100 * $originalfee;
            $finalfee = (float)$originalfee - (float)$discountablefee;

            $html[$key]['tdsource'] .= '<td>' . $finalfee . '$' . '</td>';
            $html[$key]['tdsource'] .= '<td>';
            $html[$key]['tdsource'] .= '<a class="btn btn-sm btn-' . $color . '"
                title = "Payslip" target = "_blank" href="' . route("student.registration.fee.payslip") .
                '?student_class_id=' . $v->student_class_id . '&student_id=' . $v->student_id . '">Fee Slip</a>';
            $html[$key]['tdsource'] .= '</td>';
        }
        return response()->json(@$html);
    }

    public function RegFeePayslip(Request $request)
    {
        $student_id = $request->student_id;
        $student_class_id = $request->student_class_id;

        $allStudent['details'] = AssignStudent::with(['student', 'discount'])->where('student_id', $request->student_id)->where('student_class_id', $request->student_class_id)->first();

        $pdf = PDF::loadView('backend.student.reg_fee.reg_fee_pdf', $allStudent);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
