<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use App\Models\OtherCosts;
use Illuminate\Http\Request;

class OtherCostsController extends Controller
{
    public function OtherCostsView()
    {
        $data['allData'] = OtherCosts::orderBy('id', 'desc')->get();
        return view('backend.account.other_costs.other_costs_view', $data);
    }

    public function OtherCostsAdd()
    {
        return view('backend.account.other_costs.other_costs_add');
    }

    public function OtherCostsStore(Request $request)
    {
        $cost = new OtherCosts();
        $cost->date = date('Y-m-d', strtotime($request->date));
        $cost->amount = $request->amount;
        if ($request->file('image')) {
            $file = $request->file('image');
            //@unlink(public_path('upload/cost_images/' . $data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/cost_images'), $filename);
            $cost['image'] = $filename;
        }
        $cost->description = $request->description;

        $cost->save();

        $notification = array(
            'message' => 'Data Inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('other.costs.view')->with($notification);
    }

    public function OtherCostsEdit($id)
    {
        $data['editData'] = OtherCosts::find($id);
        return view('backend.account.other_costs.other_costs_edit', $data);
    }

    public function OtherCostsUpdate(Request $request, $id)
    {
        $cost = OtherCosts::find($id);
        $cost->date = date('Y-m-d', strtotime($request->date));
        $cost->amount = $request->amount;
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/cost_images/' . $cost->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/cost_images'), $filename);
            $cost['image'] = $filename;
        }
        $cost->description = $request->description;

        $cost->save();

        $notification = array(
            'message' => 'Data Updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('other.costs.view')->with($notification);
    }
}
