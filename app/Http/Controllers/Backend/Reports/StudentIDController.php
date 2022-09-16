<?php

namespace App\Http\Controllers\backend\reports;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

use PDF;

class StudentIDController extends Controller
{
    public function IdCardView()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();

        return view('backend.reports.idcard.idcard_view', $data);
    }

    public function IdCardGet(Request $request)
    {
        $year_id = $request->year_id;
        $student_class_id = $request->student_class_id;

        $checkData = AssignStudent::where('year_id', $year_id)->where('student_class_id', $student_class_id)->first();

        if ($checkData == true) {
            $data['allData'] = AssignStudent::where('year_id', $year_id)->where('student_class_id', $student_class_id)->get();

            $pdf = PDF::loadView('backend.reports.idcard.idcard_pdf', $data);
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
