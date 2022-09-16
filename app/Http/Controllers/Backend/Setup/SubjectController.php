<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    public function SubjectView()
    {
        $data['allData'] = Subject::all();
        return view('backend.setup.subject.view_subject', $data);
    }

    public function SubjectAdd()
    {
        return view('backend.setup.subject.add_subject');
    }

    public function SubjectStore(Request $request)

    {
        $validatedData = $request->validate([
            'name' => 'required|unique:subjects,name',

        ]);

        $data = new Subject();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Subject Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('subject.view')->with($notification);
    }

    public function SubjectEdit($id)
    {
        $editData = Subject::find($id);
        return view('backend.setup.subject.edit_subject', compact('editData'));
    }

    public function SubjectUpdate(Request $request, $id)
    {
        $data = Subject::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:subjects,name,' . $data->id

        ]);


        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Subject Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('subject.view')->with($notification);
    }

    public function SubjectDelete($id)
    {
        $data = Subject::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Subject Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('subject.view')->with($notification);
    }
}
