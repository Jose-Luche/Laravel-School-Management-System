<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use App\Models\AccountStudentFee;
use App\Models\AssignStudent;
use App\Models\FeeAmount;
use App\Models\FeeCategory;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentFeeController extends Controller
{
    public function StudentFeeView()
    {
        $data['allData'] = AccountStudentFee::all();
        return view('backend.account.student_fee.student_fee_view', $data);
    }



    public function StudentFeeAdd()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['fee_categories'] = FeeCategory::all();

        return view('backend.account.student_fee.student_fee_add', $data);
    }

    public function StudentFeeGetStudent(Request $request)
    {
        $year_id = $request->year_id;
        $student_class_id = $request->student_class_id;
        $fee_category_id = $request->fee_category_id;
        $date = date('Y-m', strtotime($request->date));

        $data = AssignStudent::with(['discount'])->where('year_id', $year_id)->where('student_class_id', $student_class_id)->get();

        $html['thsource'] = '<th>ID No</th>';
        $html['thsource'] .= '<th>Student Name</th>';
        $html['thsource'] .= '<th>Father Name</th>';
        $html['thsource'] .= '<th>Original Fee</th>';
        $html['thsource'] .= '<th>Discount Amount</th>';
        $html['thsource'] .= '<th>Fee(This Student)</th>';
        $html['thsource'] .= '<th>Select</th>';

        foreach ($data as $key => $v) {
            $regfee = FeeAmount::where('fee_category_id', $fee_category_id)->where('student_class_id', $v->student_class_id)->first();
            $studentfees = AccountStudentFee::where('student_id', $v->student_id)->where('year_id', $v->year_id)->where('class_id', $v->student_class_id)->where('fee_category_id', $fee_category_id)->where('date', $date)->first();

            if ($studentfees != null) {
                $checked = 'checked';
            } else {
                $checked = '';
            }

            $color = 'success';
            $html[$key]['tdsource'] = '<td>' . $v['student']['id_no'] . '<input
            type="hidden" name="fee_category_id" value=" ' . $fee_category_id . ' ">' . '</td>';

            $html[$key]['tdsource'] .= '<td>' . $v['student']['name'] . '<input
            type="hidden" name="year_id" value=" ' . $year_id . ' ">' . '</td>';

            $html[$key]['tdsource'] .= '<td>' . $v['student']['fname'] . '<input
            type="hidden" name="student_class_id" value=" ' . $student_class_id . ' ">' . '</td>';

            $html[$key]['tdsource'] .= '<td>' . $regfee->amount . '<input
            type="hidden" name="date" value=" ' . $date . ' ">' . '</td>';

            $html[$key]['tdsource'] .= '<td>' . $v['discount']['discount'] . '%' . '</td>';

            $originalfee = $regfee->amount;
            $discount = $v['discount']['discount'];
            $discountablefee = $discount / 100 * $originalfee;
            $finalfee = (int)$originalfee - (int)$discountablefee;

            $html[$key]['tdsource'] .= '<td>' . '<input
            type="text" name="amount[]" value=" ' . $finalfee . ' " class="form-control" readonly>' . '</td>';

            $html[$key]['tdsource'] .= '<td>' . '<input type="hidden" name="student_id[]" 
            value=" ' . $v->student_id . '">' . '<input type="checkbox" name="checkmanage[]"
            id="' . $key . '" value="' . $key . '" ' . $checked . ' style="transform:scale(1.5);margin-left:10px;"> <label for="' . $key . '">
            </label> ' . '</td>';
        }
        return response()->json(@$html);
    }

    public function StudentFeeStore(Request $request)
    {
        $date = date('Y-m-d', strtotime($request->date));

        AccountStudentFee::where('year_id', $request->year_id)->where('class_id', $request->student_class_id)->where('fee_category_id', $request->fee_category_id)->where('date', $request->date)->delete();

        $checkdata = $request->checkmanage;
        if ($checkdata != null) {
            for ($i = 0; $i < count($checkdata); $i++) {
                $data = new AccountStudentFee();
                $data->year_id = $request->year_id;
                $data->class_id = $request->student_class_id;
                $data->date = $date;
                $data->fee_category_id = $request->fee_category_id;
                $data->student_id = $request->student_id[$checkdata[$i]];
                $data->amount = $request->amount[$checkdata[$i]];

                $data->save();
            }
        }

        if (!empty(@$data) || empty($checkdata)) {

            $notification = array(
                'message' => 'Done! Data Inserted successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('student.fee.view')->with($notification);
        } else {
            $notification = array(
                'message' => 'Sorry! Data not saved',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    }
}
