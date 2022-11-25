<?php

namespace App\Http\Controllers\Backend\student;

use App\Models\Prospect;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Http\Controllers\Controller;

class ProspectController extends Controller
{
    public function ProsView()
    {
        $data['allData'] = Prospect::all();

        return view('backend.student.prospects.viewPros', $data);
    }

    public function ProsAdd()
    {

        return view('backend.student.prospects.addPros');
    }

    public function PrStore(Request $request)
    {
        $data = new Prospect();
        $data->name = $request->name;
        $data->id_no = $request->id_no;
        $data->noKin = $request->noKin;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->gender = $request->gender;
        $data->email = $request->email;
        $data->dob = $request->dob;
        $data->occupation = $request->occupation;

        if ($request->file('image')) {
            $file = $request->file('image');
            //@unlink(public_path('upload/user_image/' . $user->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/prospect_images'), $filename);
            $data['image'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Data Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('prospect.view')->with($notification);
    }

    public function PrEdit($id)
    {
        $editData = Prospect::find($id);
        return view('backend.student.prospects.editPros', compact('editData'));
    }

    public function PrUpdate(Request $request, $id)
    {
        $data = Prospect::find($id);
        $data->name = $request->name;
        $data->id_no = $request->id_no;
        $data->noKin = $request->noKin;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->gender = $request->gender;
        $data->email = $request->email;
        $data->dob = $request->dob;
        $data->occupation = $request->occupation;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/prospect_images/' . $data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/prospect_images'), $filename);
            $data['image'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Data Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function PrDelete($id)
    {
        $data = Prospect::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Prospect Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('prospect.view')->with($notification);
    }
}
