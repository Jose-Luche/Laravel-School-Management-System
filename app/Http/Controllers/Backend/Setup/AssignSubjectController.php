<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use App\Models\StudentClass;
use App\Models\Subject;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller
{
    public function AssignSubjectView()
    {
        //$data['allData'] = AssignSubject::all();
        $data['allData'] = AssignSubject::select('student_class_id')->groupBy('student_class_id')->get();
        return view('backend.setup.assign_sub.view_assign_sub', $data);
    }

    public function AssignSubjectAdd()
    {
        $data['subjects'] = Subject::all();
        $data['student_classes'] = StudentClass::all();
        return view('backend.setup.assign_sub.add_assign_sub', $data);
    }

    public function AssignSubjectStore(Request $request)
    {
        $countSubject = count($request->subject_id);
        if ($countSubject != NULL) {
            for ($i = 0; $i < $countSubject; $i++) {
                $assign_subject = new AssignSubject();
                $assign_subject->student_class_id = $request->student_class_id;
                $assign_subject->subject_id = $request->subject_id[$i];
                $assign_subject->full_mark = $request->full_mark[$i];
                $assign_subject->pass_mark = $request->pass_mark[$i];
                $assign_subject->subjective_mark = $request->subjective_mark[$i];

                $assign_subject->save();
            }
        }

        $notification = array(
            'message' => 'Subject Assigned Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('assign.subject.view')->with($notification);
    }

    public function AssignSubjectEdit($student_class_id)
    {
        $data['editData'] = AssignSubject::where('student_class_id', $student_class_id)->orderBy('subject_id', 'asc')->get();

        $data['subjects'] = Subject::all();
        $data['student_classes'] = StudentClass::all();
        return view('backend.setup.assign_sub.edit_assign_sub', $data);
    }

    public function AssignSubjectUpdate(Request $request, $student_class_id)
    {
        if ($request->subject_id == NULL) {
            $notification = array(
                'message' => 'No Assigned Subject added',
                'alert-type' => 'error'
            );

            return redirect()->route('assign.subject.edit', $student_class_id)->with($notification);
        } else {
            $countSubject = count($request->subject_id);
            AssignSubject::where('student_class_id', $student_class_id)->delete();
            for ($i = 0; $i < $countSubject; $i++) {
                $assign_subject = new AssignSubject();
                $assign_subject->student_class_id = $request->student_class_id;
                $assign_subject->subject_id = $request->subject_id[$i];
                $assign_subject->full_mark = $request->full_mark[$i];
                $assign_subject->pass_mark = $request->pass_mark[$i];
                $assign_subject->subjective_mark = $request->subjective_mark[$i];

                $assign_subject->save();
            }


            $notification = array(
                'message' => 'Data Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('assign.subject.view')->with($notification);
        }
    }

    public function AssignSubjectDetails($student_class_id)
    {
        $data['detailsData'] = AssignSubject::where('student_class_id', $student_class_id)->orderBy('subject_id', 'asc')->get();

        return view('backend.setup.assign_sub.details_assign_sub', $data);
    }
}
