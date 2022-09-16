<?php

namespace App\Http\Controllers\Backend\Reports;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use App\Models\Grade;
use App\Models\StudentClass;
use App\Models\StudentMarks;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class MarksheetController extends Controller
{
    public function MarksheetView()
    {
        $data['years'] = StudentYear::orderBy('id', 'desc')->get();
        $data['classes'] = StudentClass::all();
        $data['exam_type'] = ExamType::all();

        return view('backend.reports.marksheet.marksheet_view', $data);
    }

    public function MarksheetGet(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->student_class_id;
        $exam_type_id = $request->exam_type_id;
        $id_no = $request->id_no;

        $count_fail = StudentMarks::where('year_id', $year_id)->where('class_id', $class_id)->where('exam_type_id', $exam_type_id)->where('id_no', $id_no)->where('marks', '<', '33')->get()->count();

        $single_student = StudentMarks::where('year_id', $year_id)->where('class_id', $class_id)->where('exam_type_id', $exam_type_id)->where('id_no', $id_no)->first();

        if ($single_student == true) {
            $allMarks = StudentMarks::with(['assign_subject', 'year'])->where('year_id', $year_id)->where('class_id', $class_id)->where('exam_type_id', $exam_type_id)->where('id_no', $id_no)->get();

            $allGrades = Grade::all();

            return view('backend.reports.marksheet.marksheet_pdf', compact('allMarks', 'allGrades', 'count_fail'));
        } else {
            $notification = array(
                'message' => 'Sorry!The Records do not match',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
