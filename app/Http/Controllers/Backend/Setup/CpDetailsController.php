<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\comDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CpDetailsController extends Controller
{
    public function viewDetails()
    {
        $data['allData'] = comDetails::all();
        return view('backend.setup.cpDetails.viewDts', $data);
    }
    public function addDetails()
    {
        return view('backend.setup.cpDetails.addDts');
    }

    public function storeDetails(Request $request)
    {
        $data = new comDetails();
        $data->name = $request->name;
        $data->brCode = $request->brCode;
        $data->country = $request->country;
        $data->cCode = $request->cCode;
        $data->zipCode = $request->zipCode;
        $data->city = $request->city;
        $data->tel = $request->tel;
        $data->mobile = $request->mobile;
        $data->phLocation = $request->phLocation;
        $data->payOptions = $request->payOptions;

        if ($request->file('image')) {
            $file = $request->file('image');
            //@unlink(public_path('upload/user_image/' . $user->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/company_images'), $filename);
            $data['image'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Data Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function editDetails($id)
    {
        $editData = comDetails::find($id);
        return view('backend.setup.cpDetails.editDts', compact('editData'));
    }

    public function upDetails(Request $request, $id)
    {
        $data = comDetails::find($id);
        $data->name = $request->name;
        $data->brCode = $request->brCode;
        $data->country = $request->country;
        $data->cCode = $request->cCode;
        $data->zipCode = $request->zipCode;
        $data->city = $request->city;
        $data->tel = $request->tel;
        $data->mobile = $request->mobile;
        $data->phLocation = $request->phLocation;
        $data->payOptions = $request->payOptions;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/company_images/' . $data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/company_images'), $filename);
            $data['image'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Data Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('details.view')->with($notification);
    }
}
