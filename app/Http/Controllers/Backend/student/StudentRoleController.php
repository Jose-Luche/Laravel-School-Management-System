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
use Illuminate\Support\Facades\DB;
use Mockery\Undefined;
use PDF;

class StudentRoleController extends Controller
{
    public function StudentRoleView()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        return view('backend.student.role_generate.view_role', $data);
    }

    public function GetStudents(Request $request)
    {
        //dd('ok done');
        $allData = AssignStudent::with(['student'])->where('year_id', $request->year_id)->where('student_class_id', $request->student_class_id)->get();
        //dd($allData->toArray());
        return response()->json($allData);
    }

    public function StudentRoleStore(Request $request)
    {
        $year_id = $request->year_id;
        $student_class_id = $request->student_class_id;

        if ($request->student_id != null) {
            for ($i = 0; $i < count($request->student_id); $i++) {
                AssignStudent::where('year_id', $request->year_id)->where('student_class_id', $request->student_class_id)->where('student_id', $request->student_id[$i])->update(['role' => $request->role[$i]]);
            }
        } else {
            $notification = array(
                'message' => 'No student found',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
        $notification = array(
            'message' => 'Perfect. Role generated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('role.generate.view')->with($notification);
    }
}
