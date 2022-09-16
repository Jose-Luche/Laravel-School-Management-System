<?php

namespace App\Http\Controllers\Backend\Marks;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function GradeView()
    {
        $data['allData'] = Grade::all();
        return view('backend.marks.grade_view', $data);
    }

    public function GradeAdd()
    {
        return view('backend.marks.grade_add');
    }

    public function GradeStore(Request $request)
    {
        $data = new Grade();
        $data->grade_name = $request->grade_name;
        $data->grade_point = $request->grade_point;
        $data->start_marks = $request->start_marks;
        $data->end_marks = $request->end_marks;
        $data->start_point = $request->start_point;
        $data->end_point = $request->end_point;
        $data->remarks = $request->remarks;

        $data->save();

        $notification = array(
            'message' => 'Grade Inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('grade.view')->with($notification);
    }

    public function GradeEdit($id)
    {
        $data['editData'] = Grade::find($id);
        return view('backend.marks.grade_edit', $data);
    }

    public function GradeUpdate(Request $request, $id)
    {

        $data = Grade::find($id);
        $data->grade_name = $request->grade_name;
        $data->grade_point = $request->grade_point;
        $data->start_marks = $request->start_marks;
        $data->end_marks = $request->end_marks;
        $data->start_point = $request->start_point;
        $data->end_point = $request->end_point;
        $data->remarks = $request->remarks;

        $data->save();

        $notification = array(
            'message' => 'Grade Updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('grade.view')->with($notification);
    }
}
