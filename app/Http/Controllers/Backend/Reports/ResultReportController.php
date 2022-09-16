<?php

namespace App\Http\Controllers\backend\reports;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\StudentMarks;
use App\Models\StudentYear;
use Illuminate\Http\Request;

use PDF;

class ResultReportController extends Controller
{
    public function ResultView()
    {
        $data['years'] = StudentYear::all();
        $data['student_classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();

        return view('backend.reports.student_results.student_results_view', $data);
    }

    public function ResultGet(Request $request)
    {
        $year_id = $request->year_id;
        $student_class_id = $request->student_class_id;
        $exam_type_id = $request->exam_type_id;

        //Get Single Row Result
        $singleResult = StudentMarks::where('year_id', $year_id)->where('class_id', $student_class_id)->where('exam_type_id', $exam_type_id)->first();

        if ($singleResult == true) {
            $data['allData'] = StudentMarks::select('year_id', 'class_id', 'exam_type_id', 'student_id')->where('year_id', $year_id)->where('class_id', $student_class_id)->where('exam_type_id', $exam_type_id)->groupBy('year_id')->groupBy('class_id')->groupBy('exam_type_id')->groupBy('student_id')->get();

            $pdf = PDF::loadView('backend.reports.student_results.student_results_pdf', $data);
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
