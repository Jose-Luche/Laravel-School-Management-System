<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\StudentGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentGroupController extends Controller
{
    public function StudentGroupView()
    {
        $data['allData'] = StudentGroup::all();
        return view('backend.setup.group.view_group', $data);
    }

    public function StudentGroupAdd()
    {
        return view('backend.setup.group.add_group');
    }

    public function StudentGroupStore(Request $request)

    {
        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name',

        ]);

        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Group Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.group.view')->with($notification);
    }

    public function StudentGroupEdit($id)
    {
        $editData = StudentGroup::find($id);
        return view('backend.setup.group.edit_group', compact('editData'));
    }

    public function StudentGroupUpdate(Request $request, $id)
    {
        $data = StudentGroup::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name,' . $data->id

        ]);


        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.group.view')->with($notification);
    }

    public function StudentGroupDelete($id)
    {
        $data = StudentGroup::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Student Group Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('student.group.view')->with($notification);
    }
}
