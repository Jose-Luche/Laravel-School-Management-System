<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\AssignSubject;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function GetSubject(Request $request)
    {
        $student_class_id = $request->student_class_id;
        $allData = AssignSubject::with(['subject'])->where('student_class_id', $student_class_id)->get();

        return response()->json($allData);
    }

    public function GetStudents(Request $request)
    {
        $year_id = $request->year_id;
        $student_class_id = $request->student_class_id;
        $allData = AssignStudent::with(['student'])->where('year_id', $year_id)->where('student_class_id', $student_class_id)->get();

        return response()->json($allData);
    }
}
